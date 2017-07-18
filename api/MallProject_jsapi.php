<?php 
ini_set('date.timezone','Asia/Shanghai');

require_once "lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';


$param="";
if(isset($_SERVER['QUERY_STRING']))
	$param=$_SERVER['QUERY_STRING'];

	
$URL="http://".$_SERVER["HTTP_HOST"]."/MallProject/io/order/getorder?".$param;
$content = file_get_contents($URL);
if(preg_match('/^\xEF\xBB\xBF/',$content))
{
	$content=substr($content,3);
}
$order = json_decode($content);

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m').'.log');
$log = Log::Init($logHandler, 15);
if($order==false || $order==null || $order->errcode!=0)
{
	Log::DEBUG("json error:".$content);
	die();
}
Log::DEBUG("json content:".$content);
$order_out_no = $order->order->wx_order_outid;
$order_name = $order->order->order_name;
$order_fee = $order->order->paytotalfee;

//$order_fee = 0.01; //临时Debug
//打印输出数组信息
// function printf_info($data)
// {
//     foreach($data as $key=>$value){
//         echo "<font color='#00ff55;'>$key</font> : $value <br/>";
//     }
// }

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();
$notify_url = "http://".$_SERVER["HTTP_HOST"]."/pay/wxpay/MallProject_nodify.php";
$success_url = "http://".$_SERVER["HTTP_HOST"]."/MallProject/io/?openid=".$openId;
// sunshine  me
Log::DEBUG("openId:".$openId);

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($order_name);
$input->SetAttach($order_name);
$input->SetOut_trade_no($order_out_no);
$input->SetTotal_fee( intval($order_fee*100));
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url($notify_url);
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);

///printf_info($order);

$jsApiParameters = $tools->GetJsApiParameters($order);

Log::DEBUG("order:".json_encode($order));

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付样例-支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				//alert(res.err_code+res.err_desc+res.err_msg);
				if(res.err_msg=="get_brand_wcpay_request:ok"){
					alert('支付成功');
					window.location.href = "<?php echo $success_url;?>";
				}else{
					alert('支付失败，请重新支付');
				}
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<script type="text/javascript">
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		if (typeof WeixinJSBridge == "undefined"){
			/*
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
			*/
		}else{
			//editAddress();
		}
		
		callpay();
	};
	
	</script>

	<style type="text/css">
	  body{
	    background-color: rgba(232, 232, 232, 0.22);
	    font-family: "微软雅黑";
	    margin: 0px;
	  }
	  .tc{
	    text-align: center;
	  }
	  .mt20{
	    margin-top: 20px;
	  }
	  .p1{
	    font-size: 18px;
	    margin-bottom: 0;
	  }
	  .cost{
	    font-size: 40px;
	    font-weight: bold;
	    margin-top: 0;
	    margin-bottom: 10px;
	  }
	  .de{
	    background-color: #fff;
	    margin: 0;
	    padding: 15px;
	    border-bottom: 1px solid #eaeaea;
	    border-top: 1px solid #eaeaea;
	  }
	  .fr{
	    float: right;
	  }
	  .gray{
	    color:#6d6d6d;
	  }
	  button{
	    width: 90%;
	    height: 40px;
	    text-align: center;
	    background-color: green;
	    color:#fff;
	    font-size: 16px;
	    border: 0px;
	    outline: 0;
	    margin: auto;
	    margin-top: 30px;
	    border-radius: 5px;
	  }
	</style>

</head>
<body>
	<p class="tc mt20 p1">和煦公社订单</p>
  <p class="tc cost"><span>￥</span><span><?php echo round($order_fee,2);?></span></p>
  <p class="de">
    <span class="fl gray">收款方</span>
    <span class="fr">和煦公社</span>
  </p>
  <div class="btn-arae tc">
    <button type="button" onClick="callpay();">立即支付</button>
  </div>
</body>
</html>
