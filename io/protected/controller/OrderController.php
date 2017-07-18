<?php
require_once('./wxconfig.php');
class OrderController extends BaseController
{
	
	public function log($str)
	{
		file_put_contents("order.log","[".date('Y-m-d H:i:s')."] - ".$str.PHP_EOL,FILE_APPEND);
	}

	function actionGetorder()
	{
		$orderid = arg('orderid'); //只需要传入orderid即可
		$order = new Model('payment_order');
		$condition = array('order_id'=>$orderid);
		$item = $order->find($condition);
		if($item){
			$ret = array('errcode'=> 0, 'errmsg'=>'','order'=>$item);
		}else{
			$ret = array('errcode'=> -1, 'errmsg'=>'无此订单存在或订单已失效，请重新下单');
		}
		echo json_encode($ret);
	}
	
	function actionCreateorder()
	{
		$openid = arg('openid');
		$amount = intval(arg('amount'));
		$productid = intval(arg('productid'));
		$addressid = intval(arg("addressid"));
		if( strlen($openid)<=0){
			echo json_encode(array('errcode'=> -1, 'errmsg'=>'用户不存在'));
			return;
		}
		if( strlen($productid)<=0 || $amount<=0 ){
			echo json_encode(array('errcode'=> -2, 'errmsg'=>'产品不存在或购买数量不正确'));
			return;
		}
		
		$product = new Model('product');
		$pcon = array('product_id'=>$productid);
		$pitem = $product->find($pcon);
		
		if($pitem==false){
			echo json_encode(array('errcode'=> -3, 'errmsg'=>'产品不存在不能购买'));
			return;
		}
		///////////判断是否符合购买条件////////////
		$userinfo = new Model('userinfo');
		$ucon = array('wx_openid'=>$openid);
		$uitem = $userinfo->find($ucon);
		if($uitem==false){
			echo json_encode(array('errcode'=> -4, 'errmsg'=>'不存在该用户信息，请刷新网页，重新进入'));
			return;
		}
		//当user_type为1时，表示该用户为vip用户，当为0时，表示该用户为正常用户
		$user_type = intval($uitem['user_type']);
		if(!$user_type){
			echo json_encode(array('errcode'=> -5, 'errmsg'=>'请先成为vip用户后，在进行购买'));
			return;
		}
		$this->log("create_order check_perm_exchange true openid:".$openid);
		/////////////////结束检查判断条件//////////////////////
		
		$price = floatval($pitem['product_price']);
		$order_name = $pitem['product_name'];
		$total_fee = $price*$amount;
		
		$this->log("create_order order price:".$price." total_fee:".$total_fee);
		
		$order = new Model('payment_order');
		$item = array('wx_openid'=>$openid, 'product_id'=>$productid, 'address_id'=>$addressid, 'order_name'=>$order_name,'payamount'=>$amount,
						'wx_order_outid'=>MCHID."_".date('Ymd_His')."_".rand(1000,9999),'createtime'=>date('Y-m-d H:i:s'),	
						'paytotalfee'=>$total_fee,'status'=>'init','sessionid'=>session_id());
		$order_id = $order->create($item);
		echo json_encode(array('errcode'=> 0, 'errmsg'=>'', 'orderid'=>$order_id, 'payurl'=>"http://wx.hexugongshe.com/pay/wxpay/MallProject_jsapi.php?orderid=$order_id"));
		
		
	}
	
	
	function actionPayback()
	{
		$log=arg("log");
		$obj=json_decode($log);
		if($obj==false || $obj==null){
			return;
		}
		$num = 1;
		$order_no = $obj->out_trade_no;
		$wx_tran_id = $obj->transaction_id;
		$order = new Model('payment_order');
		$cond = array('wx_order_outid'=>$order_no);
		$item = $order->find($cond);
		$openid = "";
		$order_id = "";
		if($item){
			$order->update($cond,array('status'=>'finish'));
			$order->update($cond,array('finishtime'=>date("Y-m-d H:i:s")));
			$order->update($cond,array('wx_order_id'=>$wx_tran_id));
			$order->update($cond,array('log'=>$log));
			$ret = array('errcode'=> 0, 'errmsg'=>'');
			//这里可以将数据写在同一个数组一起录入，但是为了防止数据出错，分开写，可将能录入的数据，尽可能的录入。;
			
		}else{
			$ret = array('errcode'=> -1, 'errmsg'=>'error order_no');
		}
		$this->log("Payback-msg:".json_encode($obj));
		echo json_encode($ret);
		
	}

	//获取已购买的订单信息	
	//////////////////////////////////////////////
	public function actionPaymentorder(){
		$openid = $_SESSION['openid'];
		$payment = new Model('payment_order');
		$con = array('wx_openid'=>$openid);
		$items = $payment->findAll($con);
		if($items){
			$ret = array('errcode'=> 0, 'errmsg'=>'','order'=>$items);
		}else{
			$ret = array('errcode'=> -1, 'errmsg'=>'该用户暂无订单记录');
		}
		echo json_encode($ret);
	}

}

?>