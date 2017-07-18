<?php
session_start();
$session=session_id();
define("APPID","wx07762020a9b86223");
define("APPSECRET","88f6e23a190e6c0bf2f44971b5c44379");

function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
function getIP()
{
	global $ip;
	if (getenv("HTTP_CLIENT_IP"))
	$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
	$ip = getenv("REMOTE_ADDR");
	else $ip = "Unknow";
	return $ip;
}
function arg($name)
{
	if(isset($_GET[$name]))	return $_GET[$name];
	if(isset($_POST[$name])) return $_POST[$name];
	return '';
}

$appid = APPID;  
$secret = APPSECRET;  
$code = $_GET["code"];

//$state = "";
//if(isset($_GET["state"]))
//	$state = $_GET["state"];

$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
$token = getJson($url);
$openid = $token['openid'];
$scope = $token['scope'];
$access_token = $token['access_token'];


$dir='http://'.$_SERVER['SERVER_NAME']; 
$ui_url = $dir."/MallProject/io/?openid=".$openid;
//if(strlen($state)>0){
//  $ui_url = $ui_url."&token=".$session."#".$state;
//}
$_SESSION["wx_openid"]=$openid;
if($scope=="snsapi_userinfo"){
	
	$get_user_info_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
	$userinfo = getJson($get_user_info_url); //获取到useinfo

	$create_user = "http://".$_SERVER['SERVER_NAME']."/MallProject/io/userinfo/createuserinfo?openid=".$openid."&nickname=".urlencode($userinfo['nickname'])."&headimgurl=".urlencode($userinfo['headimgurl'])."&sex=".$userinfo['sex']."&country=".$userinfo['country']."&city=".$userinfo['city']."&province=".$userinfo['province'];
	//去执行这个访问这个网站
	file_get_contents($create_user);
//	echo 'execute!';
}else{
	
	echo "openid: $openids";

}

header("Location: ".$ui_url);
?>
