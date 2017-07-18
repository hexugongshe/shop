<?php
require_once('./wxconfig.php');
class MainController extends BaseController {
	function actionIndex(){
		//		error_reporting(E_ALL);
		//		ini_set('display_errors', '1');
		$openid = arg('openid');
		$_SESSION['openid'] = $openid;
		$this->openid = $openid;
		$shareJson = $this->wx_jssdk();
		//该部分为设置微信分享接口
		//////////////////////
		$shareDate = json_decode($shareJson,true); 		//json_decode默认为将字符串转化为对象，设置为true是，json字符串转化为数组。
		$this->shareDate = $shareDate;
		
		
		
		
		
		//判断是否为会员部分
		
		$userinfo = new Model('userinfo');
		$userinfo_con = array('wx_openid'=>$openid);
		$user_item = $userinfo->find($userinfo_con);
		$judge = intval($user_item['user_type']);
//		if($judge){
//			echo 'vip';
//		}else{
//			echo 'normal';
//		}
		
//		$this->tips("登陆成功",url("main","index"));
		
			
		
		$this->display('home.html');
	}
	
	
	function actionMall(){
//		$_SESSION['openid'] = $openid;
//		$this->openid = $openid;


		//该部分为设置商品信息接口
		$product_condition = array();
		$product = new model('product');
		
		$product_item = $product->findAll($product_condition);
		
		$this->pmsg = $product_item;
		
		//商品的信息接口为$pmsg
		$this->display('mall.html');
	}
	
	function actionContact(){
		
//		$_SESSION['openid'] = $openid;
//		$this->openid = $openid;
		$this->display('contact.html');
	}
	
	function actionPerson(){
		$this->display('personal.html');
	}
	
	function actionShow(){
		$order = new Model('userinfo');
		$con = array('user_code'=>326);
		$order->update($con,array('add_id'=>5,'user_idno'=>123));
		echo 'hello world';
	}
	
	
	
	//微信服务器交互token
	public function weixin_token()
	{
		$tokenModel = new Model("weixin_token");
		$t = time();
		$datestr = date('Y-m-d H:i:s',$t);
		$condition = array(
		'request_timestamp > :outlineTime',
		'outlineTime'=>($t-7200)
		);
		$item = $tokenModel->find($condition);
		if($item){
			return $item['access_token'];
		}
		$response = $this->curlGet("https://api.weixin.qq.com/cgi-bin/token",
		  "grant_type=client_credential&appid=".APPID."&secret=".APPSECRET);
		  $obj = json_decode($response);
		  if($obj){
		  		$newitem = array("access_token"=>$obj->access_token,"request_time"=>$datestr,"request_timestamp"=>$t);
			$tokenModel->create($newitem);
			return $obj->access_token;
		  }
		  return "";
		
	}
	
	public function weixin_ticket($token)
	{
		$ticketModel = new Model('weixin_ticket');
		$t = time();
		$datestr = date('Y-m-d H:i:s',$t);
		$condition = array(
		'request_timestamp > :outlineTime',
		'outlineTime'=>($t-7200),
		);
		$item = $ticketModel->find($condition);
		if($item){
			return $item['access_ticket'];
		}
		$response = $this->curlGet("https://api.weixin.qq.com/cgi-bin/ticket/getticket","access_token=$token&type=jsapi");
		$obj = json_decode($response);
		if($obj && $obj->errcode==0){
			$newitem = array("access_ticket"=>$obj->ticket,"request_time"=>$datestr,"request_timestamp"=>$t);
			$ticketModel->create($newitem);
			return $obj->ticket;
		}
		return "";
	}
	function wx_jssdk()
	{
		//error_reporting(E_ALL); 
		//ini_set("display_errors", 1);
		date_default_timezone_set('Asia/Shanghai');
		$token = $this->weixin_token();
		if( strlen($token)==0 )
		{
			$obj = array('errcode'=>-1,'errmsg'=>'网络异常，请重试');
			echo json_encode($obj);
			return;
		}
		$ticket = $this->weixin_ticket($token);
		if( strlen($ticket)==0 )
		{
			$obj = array('errcode'=>-1,'errmsg'=>'网络异常，请重试');
			echo json_encode($obj);
			return;
		}
		$timestamp = time();
		$openid = arg('openid');
		$dir='http://'.$_SERVER['SERVER_NAME'];
		$url = $dir."/MallProject/io/?openid=".$openid;
		$noncestr = substr($timestamp.APPID,0,16);
		$param = "jsapi_ticket=$ticket&noncestr=$noncestr&timestamp=$timestamp&url=$url";
		$signature = sha1($param);
		$obj = array("errcode"=>0, "errmsg"=>'', "appid"=>APPID, "timestamp"=>$timestamp,
				"nonceStr"=>$noncestr, "signature"=>$signature, "link"=>$url, 'token'=>$token, 'ticket'=>$ticket,'openid'=>$openid,"url"=>$url);
		$this->recv_log('result:'.json_encode($obj).PHP_EOL);
		return json_encode($obj);
		
	}


	function recv_log($result)
	{
		file_put_contents("recv_log.txt",date("Y-m-d H:i:s").PHP_EOL.$result.PHP_EOL,FILE_APPEND);
	}




//报头获取数据

function curlPost($url, $data, $timeout = 30)
{
    $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
    $ch = curl_init();
    $opt = array(
            CURLOPT_URL     => $url,
            CURLOPT_POST    => 1,
            CURLOPT_HEADER  => 0,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT         => $timeout,
            );
    if ($ssl)
    {
        $opt[CURLOPT_SSL_VERIFYHOST] = 1;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
    }
    curl_setopt_array($ch, $opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function curlPostJson($url, $data, $timeout = 30)
{
    $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
    $ch = curl_init();
    $opt = array(
            CURLOPT_URL     => $url,
            CURLOPT_POST    => 1,
            CURLOPT_HEADER  => 0,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT         => $timeout,
			CURLOPT_HTTPHEADER		=>array(  
				'Content-Type: application/json; charset=utf-8',  
				'Content-Length: '.strlen($data) ),
            );
    if ($ssl)
    {
        $opt[CURLOPT_SSL_VERIFYHOST] = 1;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
    }
    curl_setopt_array($ch, $opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}


function curlGet($url, $data, $timeout = 30)
{
    $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
    $ch = curl_init();
    $opt = array(
            CURLOPT_URL     => $url."?".$data,
            CURLOPT_POST    => 0,
            CURLOPT_HEADER  => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT         => $timeout,
            );
    if ($ssl)
    {
        $opt[CURLOPT_SSL_VERIFYHOST] = 2;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
    }
    curl_setopt_array($ch,$opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

//到此结束获取报头信息

}