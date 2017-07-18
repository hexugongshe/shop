<?php
define("APPID","wx07762020a9b86223");
define("APPSECRET","88f6e23a190e6c0bf2f44971b5c44379");

$appid=APPID;

$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
$dir=dirname($url);
$redirect_uri = urlencode ($dir."/entrance.php");


$tag="";
if(isset($_GET["tag"]))
	$tag=$_GET["tag"];

$url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=$tag#wechat_redirect";

header("Location: ".$url);

?>