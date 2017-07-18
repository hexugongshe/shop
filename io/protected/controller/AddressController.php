<?php
class AddressController extends BaseController
{
	function actionShowaddress(){
		//获取用户地址数据
		/*$jsonaddress = $this->actionGetaddress();
		$user_address = json_decode($jsonaddress);*/
		$this->display('address.html');
		
		
		
	}
	function actionShowaddaddress(){
		$this->display('add_address.html');
	}
	function actionGetaddress()
	{
		$wx_openid = $_SESSION['openid'];
		$address = new Model('address');
		$condition = array('wx_openid'=>$wx_openid);
		$items = $address->findAll($condition);
		echo json_encode($items);
	}
	function actionAddaddress()
	{
//		$user_code = arg("user_code");
//		$wx_openid = arg('openid');
		$wx_openid = $_SESSION['openid'];
//		$add_type  = arg("add_type");
		$add_detail= arg("add_detail");
		$add_province= arg("add_province");
		$add_city    = arg("add_city");
		$add_country = arg("add_country");
		$add_street  = arg("add_street");
		$add_postcode= arg("add_postcode");
		$add_user     = arg("add_user");
		$add_telephone= arg("add_telephone");
		
		if(strlen($wx_openid)<=0){
			echo json_encode(array('errcode'=> -1, 'errmsg'=>'用户不存在'));
			return;
		}
		$address = new Model('address');
		$item = array('wx_openid'=>$wx_openid,'add_detail'=>$add_detail,'add_province'=>$add_province,'add_city'=>$add_city,'add_country'=>$add_city,'add_street'=>$add_street,'add_postcode'=>$add_postcode,'add_user'=>$add_user,'add_telephone'=>$add_telephone);
		$address_id = $address->create($item);
		$tmpStr = '';
		$address_id>0?$tmpStr = json_encode(array('errcode'=> 0, 'errmsg'=>'','address_id'=>$address_id)):$tmpStr = json_encode(array('errcode'=> -2, 'errmsg'=>'地址录入失败，请刷新网站后重试'));
		echo $tmpStr;
	}
	function actionUpdateaddress()
	{
		$add_id = intval(arg('add_id'));
		$add_detail= arg("add_detail");
		$add_province= arg("add_province");
		$add_city    = arg("add_city");
		$add_country = arg("add_country");
		$add_street  = arg("add_street");
		$add_postcode= arg("add_postcode");
		$add_user     = arg("add_user");
		$add_telephone= arg("add_telephone");
		$condition = array('add_id'=>$add_id);
		if($add_id<=0){
			echo json_encode(array('errcode'=> -1, 'errmsg'=>'该地址不存在，请刷新后重试'));
		}
		$item = array();
		if(strlen($add_detail<=0)){
			$item['add_detail']=$add_detail;
		}
		if(strlen($add_province<=0)){
			$item['add_province']=$add_province;
//			var_dump($item);
		}
		if(strlen($add_city<=0)){
			$item['add_city']=$add_city;
		}
		if(strlen($add_street<=0)){
			$item['add_street']=$add_street;
		}
		if(strlen($add_postcode<=0)){
			$item['add_postcode']=$add_postcode;
		}
		if(strlen($add_user<=0)){
			$item['add_user']=$add_user;
		}
		if(strlen($add_telephone<=0)){
			$item['add_telephone']=$add_telephone;
		}
		$address = new Model("address");
		$affectRow = $address->update($condition,$item);
//		echo $affectRow;
		if($affectRow<=0){
			echo json_encode(array('errcode'=> -2, 'errmsg'=>'信息已经修改完成，请勿重复提交')); //speedphp中同一信息重复提交，则受影响为0行，不会重复修改 
		}else{
			$item = $address->find($condition);
			echo json_encode(array('errcode'=> 0, 'errmsg'=>'','msg'=>$item)); 
		}
	}
	function actionDeleteaddress()
	{
		$add_id = intval(arg('add_id'));
		$condition = array('add_id'=>$add_id);
		if($add_id<=0){
			echo json_encode(array('errcode'=> -1, 'errmsg'=>'该地址不存在，请刷新后重试'));
		}
		$address = new Model('address');
		$affectRow = $address->delete($condition);
		if($affectRow<=0){
			echo json_encode(array('errcode'=> -2, 'errmsg'=>'该地址已经删除，请勿多次提交')); 
		}else{
			echo json_encode(array('errcode'=> 0, 'errmsg'=>'')); 
		}
		
	}
}
?>