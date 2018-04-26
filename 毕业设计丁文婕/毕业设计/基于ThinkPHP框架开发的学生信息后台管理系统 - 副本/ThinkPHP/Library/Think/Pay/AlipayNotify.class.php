<?php
namespace Think\Pay;
/**
* 
*/
class AlipayNotify
{
	 /**
	     * HTTPS形式消息验证地址
	     */
		private $https_verify_url = 'https://mapi.alipay.com/gateway.do?service=notify_verify&';
		/**
	     * HTTP形式消息验证地址
	     */
		private $http_verify_url = 'http://notify.alipay.com/trade/notify_query.do?';
		private $config;
		private $AlipayData;
	public function __construct()
	{
		$this->config=array_merge($this->config(),C('ALIPAY'));
	}
	public function config()
	{
		//签名方式
		$config['sign_type']    = strtoupper('MD5');

		//字符编码格式 目前支持 gbk 或 utf-8
		$config['input_charset']= strtolower('utf-8');

		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$config['cacert']    = getcwd().'\\cacert.pem';

		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$config['transport']    = 'http';

		// 支付类型 ，无需修改
		$config['payment_type'] = "1";
				
		// 产品类型，无需修改
		$config['service'] = "create_direct_pay_by_user";

		//↓↓↓↓↓↓↓↓↓↓ 请在这里配置防钓鱼信息，如果没开通防钓鱼功能，为空即可 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
			
		// 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
		$config['anti_phishing_key'] = "";
			
		// 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
		$config['exter_invoke_ip'] = "";
		return $config;
	}
	public function notify($data)
	{
		$this->AlipayData=$data;
		$verify_result=$this->verifyNotify($data);
		if($verify_result) {//验证成功
		    if ($data['trade_status'] == 'TRADE_SUCCESS'||$data['trade_status'] == 'TRADE_FINISHED') {
			  return true;
		    }else {
		      return false;
			}
		}
	}
	public function verifyNotify($data){
	  if(empty($data)) {//判断POST来的数组是否为空
		return false;
	  }else {
		//生成签名结果
		$isSign = $this->getSignVeryfy($data, $data["sign"]);
		//获取支付宝远程服务器ATN结果（验证是否是支付宝发来的消息）
		$responseTxt = 'false';
		if (!empty($data["notify_id"])) {$responseTxt = $this->getResponse($data["notify_id"]);}
			if (preg_match("/true$/i",$responseTxt) && $isSign) {
				return true;
			} else {
				return false;
			}
	  }

	}

			/**
	     * 获取远程服务器ATN结果,验证返回URL
	     * @param $notify_id 通知校验ID
	     * @return 服务器ATN结果
	     * 验证结果集：
	     * invalid命令参数不对 出现这个错误，请检测返回处理中partner和key是否为空 
	     * true 返回正确信息
	     * false 请检查防火墙或者是服务器阻止端口问题以及验证时间是否超过一分钟
	     */
		function getResponse($notify_id) {
			$transport = strtolower(trim($this->config['transport']));
			$partner = trim($this->config['partner']);
			$veryfy_url = '';
			if($transport == 'https') {
				$veryfy_url = $this->https_verify_url;
			}
			else {
				$veryfy_url = $this->http_verify_url;
			}
			$veryfy_url = $veryfy_url."partner=" . $partner . "&notify_id=" . $notify_id;
			$responseTxt = $this->getHttpResponseGET($veryfy_url, $this->config['cacert']);
			
			return $responseTxt;
		}


				/**
		 * 远程获取数据，GET模式
		 * 注意：
		 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
		 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
		 * @param $url 指定URL完整路径地址
		 * @param $cacert_url 指定当前工作目录绝对路径
		 * return 远程输出的数据
		 */
		function getHttpResponseGET($url,$cacert_url) {
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
			curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
			curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
			$responseText = curl_exec($curl);
			//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
			curl_close($curl);
			
			return $responseText;
		}


			     /**
	     * 获取返回时的签名验证结果
	     * @param $para_temp 通知返回来的参数数组
	     * @param $sign 返回的签名结果
	     * @return 签名验证结果
	     */
		function getSignVeryfy($para_temp, $sign) {
			//除去待签名参数数组中的空值和签名参数
			$para_filter = $this->paraFilter($para_temp);
			
			//对待签名参数数组排序
			ksort($para_filter);
	        reset($para_filter);
			
			//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
			$prestr = $this->createLinkstring($para_filter);
			
			$isSgin = false;
			switch (strtoupper(trim($this->config['sign_type']))) {
				case "MD5" :
					$isSgin = $this->md5Verify($prestr, $sign, $this->config['key']);
					break;
				default :
					$isSgin = false;
			}
			
			return $isSgin;
		}

		/**
		 * 除去数组中的空值和签名参数
		 * @param $para 签名参数组
		 * return 去掉空值与签名参数后的新签名参数组
		 */
		function paraFilter($para) {
			$para_filter = array();
			while (list ($key, $val) = each ($para)) {
				if($key == "sign" || $key == "sign_type" || $val == "")continue;
				else	$para_filter[$key] = $para[$key];
			}
			return $para_filter;
		}
		/**
		 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
		 * @param $para 需要拼接的数组
		 * return 拼接完成以后的字符串
		 */
		function createLinkstring($para) {
			$arg  = "";
			while (list ($key, $val) = each ($para)) {
				$arg.=$key."=".$val."&";
			}
			//去掉最后一个&字符
			$arg = substr($arg,0,count($arg)-2);
			
			//如果存在转义字符，那么去掉转义
			if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
			
			return $arg;
		}
		/**
		 * 验证签名
		 * @param $prestr 需要签名的字符串
		 * @param $sign 签名结果
		 * @param $key 私钥
		 * return 签名结果
		 */
		function md5Verify($prestr, $sign, $key) {
			$prestr = $prestr . $key;
			$mysgin = md5($prestr);

			if($mysgin == $sign) {
				return true;
			}
			else {
				return false;
			}
        }
        public function getValues()
        {
        	return $this->AlipayData;
        }


}