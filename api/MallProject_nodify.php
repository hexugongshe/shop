<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "lib/WxPay.Api.php";
require_once 'lib/WxPay.Notify.php';
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		//Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		// {"appid":"wx07762020a9b86223","attach":"\u767d\u94f6\u4f1a\u7c4d","bank_type":"CMB_CREDIT","cash_fee":"1","fee_type":"CNY","is_subscribe":"Y","mch_id":"1358103902","nonce_str":"9j98zn8p99grcy1z4jp572owopaywpxm","openid":"oyO9av2Jg4finVbb4QgrK1hmKlzI","out_trade_no":"1358103902_20160831_211914_5771","result_code":"SUCCESS","return_code":"SUCCESS","sign":"35824792E892C22AF1CAD13689F64BAF","time_end":"20160831211943","total_fee":"1","trade_type":"JSAPI","transaction_id":"4002122001201608312728653829"}
		$URL="http://wx.hexugongshe.com/MallProject/io/order/payback?&log=".urlencode(json_encode($data));
		$content = file_get_contents($URL);
		if(preg_match('/^\xEF\xBB\xBF/',$content))
			$content=substr($content,3);
		Log::DEBUG("db op:".$content);
		return true;
	}
}

Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
