<?php
define("ADMIN_PHONE","18122449062,");
define("SMS_USER","hexugongshe");
define("SMS_KEY","568390CC547ECC7DEF37255F962E1FA6");

define("SMS2_USER","wljclub");
define("SMS2_KEY","ec831a6d19934498f90e44f516864e78");

define("SMS3_APPKEY","23375833");
define("SMS3_APPSecret","eb26b0e0aba57e40ad65e729ae67c06f");

define("APPID","wx07762020a9b86223");
define("APPSECRET","88f6e23a190e6c0bf2f44971b5c44379");

define("MCHID","1358103902");

define("TOKEN","26ebbfa52147503f3ff3e28c03883e10");
define("EncodingKey","26ebbfa52147503f3ff3e28c03883e10");
		
class QrscanController extends spController
{
	
	function recv_log($result)
	{
		//$file = fopen(,"a");
		file_put_contents("recv_log.txt",date("Y-m-d H:i:s").PHP_EOL.$result.PHP_EOL,FILE_APPEND);
		//fclose($file);
	}
	//微信服务器交互token
	////////////////////////////
	public function weixin_token()
	{
		$table = spClass('weixin_token');
		$t=time();
		$datestr = date("Y-m-d H:i:s",$t);
		$condition = " request_timestamp > ".($t-7200);
		$item = $table->find($condition);
		if($item){
			//echo "find:".$item['access_token'];
			return $item['access_token'];
    	}
		//echo "verify:";
		$response = $this->curlGet("https://api.weixin.qq.com/cgi-bin/token",
			  "grant_type=client_credential&appid=".APPID."&secret=".APPSECRET);
		$obj = json_decode($response);
		//echo "$response <br/>";
		if($obj){
			//echo $obj->access_token;
			$item = array("access_token"=>$obj->access_token,"request_time"=>$datestr,"request_timestamp"=>$t);
			$table->create($item);
			return $obj->access_token;
		}
		//else
		//echo "NULL Obj".$response;
		return "";
	}

	public function weixin_ticket($token)
	{
		$table = spClass('weixin_ticket');
		$t=time();
		$datestr = date("Y-m-d H:i:s",$t);
		$condition = " request_timestamp > ".($t-7200);
		$item = $table->find($condition);
		if($item){
			//echo "find:".$item['access_ticket'];
			return $item['access_ticket'];
    	}
		//echo "verify:";
		$response = $this->curlGet("https://api.weixin.qq.com/cgi-bin/ticket/getticket","access_token=$token&type=jsapi");
		$obj = json_decode($response);
		//echo "$response <br/>";
		if($obj && $obj->errcode==0){
			//echo $obj->ticket;
			$item = array("access_ticket"=>$obj->ticket,"request_time"=>$datestr,"request_timestamp"=>$t);
			$table->create($item);
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
		if( strlen($token)==0 ){
			$obj = array("errcode"=>-1, "errmsg"=>'网络异常，请重试');
			echo json_encode($obj);
			return;
		}
		$ticket = $this->weixin_ticket($token);
		if( strlen($ticket)==0 ){
			$obj = array("errcode"=>-1, "errmsg"=>'网络异常，请重试');
			echo json_encode($obj);
			return;
		}
		$timestamp=time();

//		$url="http://wx.hexugongshe.com/MissAsia/index.html";
		
//		$url='http://'.$_SERVER['HTTP_HOST']."/MissAsia/index.html";
		//$url='http://brand.wljhealth.com/activity/2016summer/';
		
		
//		$url=$this->spArgs('url',$url);
		$openid = $this->spArgs("openid");
		$url = "http://wx.hexugongshe.com/MissAsia/index.html?openid=".$openid;

		$noncestr = substr($timestamp.APPID,0,16);
		$param="jsapi_ticket=$ticket&noncestr=$noncestr&timestamp=$timestamp&url=$url";
		
		$signature = sha1($param);
		$obj = array("errcode"=>0, "errmsg"=>'', "appid"=>APPID, "timestamp"=>$timestamp,
				"nonceStr"=>$noncestr, "signature"=>$signature, "link"=>$url, 'token'=>$token, 'ticket'=>$ticket,'openid'=>$openid,"url"=>$url);
		echo json_encode($obj);
		
		$this->recv_log('result:'.json_encode($obj).PHP_EOL);
		
	}
?>