<?php
class UserinfoController extends BaseController {
	function actionCreateuserinfo(){
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		$user = new Model("userinfo");
		$condition = array('wx_openid'=>arg('openid'));
		$item = $user->find($condition);
		$res = 0;
		if(!$item){
			$userinfo = array(
				'wx_openid'=>arg('openid'),
				'wx_nickname'=>arg('nickname'),
				'wx_headimgurl'=>arg('headimgurl'),
				'wx_sex'=>arg('sex'),
				'wx_country'=>arg('country'),
				'wx_city'=>arg('city'),
				'wx_province'=>arg('province')
			);
			$user = new Model("userinfo");
			$res = $user->create($userinfo);
		}
		$res?$Tmpstr = 'user_code:'.$res:$Tmpstr = arg('openid').' register failed or had registered';
		$this->log($Tmpstr);
	}
	
	function actionIdentify(){
		$openid = arg('openid');
		$freshcode = arg('freshcode');
		$user_idno = arg('user_idno');
		$user_name = arg('user_name');
		$user_telephone =arg('user_telephone');
		$user_email = arg('user_email');


//		$openid = 123;
//		$freshcode = 515367;
//		$user_idno = 123123123;
//		$user_name = 'sdfwerwerwer';
//		$user_telephone =12312312312;
//		$user_email = 'asasdasdasdasd';
		
		///激活码验证
		$identify = new Model('identify_code');
		$icondition = array('icode'=>$freshcode);
		
		$item = $identify->find($icondition);
		if(!$item){
			echo json_encode(array('errcode'=>'-1','errmsg'=>'该激活码不存在，请输入正确的激活码'));
			return;
		}
		$status = intval($item['status']);
		if(!$status){
			echo json_encode(array('errcode'=>'-2','errmsg'=>'该激活码已被激活过，请重新获取激活码'));
			return;
		}
		$newitem = array('status'=>'0','endtime'=>date('Y-m-d H:i:s'));
		$identify->update($icondition,$newitem);
		$tmpStr = '用户'.$openid.'使用激活码'.$freshcode;
		$this->log($tmpStr);
		
		//录入用户信息
		$ucon = array('wx_openid'=>$openid);
		$userinfo = new Model('userinfo');
		$item = array('user_idno'=>$user_idno,'user_name'=>$user_name,'user_telephone'=>$user_telephone,'user_email'=>$user_email);
		$userinfo->update($ucon,$item);
		echo json_encode(array('errcode'=>'0','errmsg'=>'激活账户成功，欢迎您，尊贵的会员'));
	}
	
	function actionCreatecode($num = 50){
		$admin = arg('admin');
		if(!$admin=="hexugongshe"){
			echo 'hello world!';
			die();
		}
		
		$identify = new Model('identify_code');
		for($i=0;$i<$num;$i++){
			$code = mt_rand(100000,999999);//mt_rand 是取值为闭区间。
			$time = date('Y-m-d H:i:s');
			$item = array('icode'=>$code,'createtime'=>$time);
			$affectRow = $identify->create($item);
			if($affectRow<=0){
				echo json_encode(array('errcode'=>'1','errmsg'=>'本次新建验证码仅插入 '.($i+1).'条，还有'.($num-$i).'条未成功插入'));
				return;
			}
		}
		
		$tmpStr = '本次新建验证码'.$num.'条，全部成功插入';
		$this->log($tmpStr);
		echo json_encode(array('errcode'=>'0','errmsg'=>'本次新建验证码'.$num.'条，全部成功插入'));
	}
	
	
	
	public function log($str)
	{
		file_put_contents("entrance.log","[".date('Y-m-d H:i:s')."] - ".$str.PHP_EOL,FILE_APPEND);
	}
	
}