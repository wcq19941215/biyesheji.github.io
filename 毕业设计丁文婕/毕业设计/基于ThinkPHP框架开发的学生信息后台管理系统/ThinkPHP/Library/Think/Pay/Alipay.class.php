<?php
namespace Think\Pay;
use Think\Config;
/**
* 
*/
class Alipay
{
	
	public $alipay_gateway_new='https://mapi.alipay.com/gateway.do?';
	private $config;
	public function __construct()
	{
		 $this->config=array_merge($this->alipay_config(),C('ALIPAY'));

	}
	/**
	* @param $data   参数数组   indent订单号,set订单名称,money金额
	*/
	public function send($data)
	{
		$parameter = array(
						"service"       => $this->config['service'],// 产品类型，无需修改
						"partner"       => $this->config['partner'],//合作身份者ID，签约账号，以2088开头由16位纯数字组成的字符串，查看地址：https://b.alipay.com/order/pidAndKey.htm
						"seller_id"  => $this->config['seller_id'],//收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
						"payment_type"	=> $this->config['payment_type'],// 支付类型 ，无需修改
						"notify_url"	=> $this->config['notify_url'],// 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问

						"return_url"	=> $this->config['return_url'],// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
						
						"anti_phishing_key"=>$this->config['anti_phishing_key'],// 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
						"exter_invoke_ip"=>$this->config['exter_invoke_ip'],// 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
						"out_trade_no"	=> $data["indent"],//商户订单号，商户网站订单系统中唯一订单号，必填
						"subject"	=> $data["set"],//订单名称，必填
						"total_fee"	=> $data["money"], //付款金额，必填
						"body"	=> $data["set"],//商品描述，可空
						"_input_charset"	=> trim(strtolower($this->config['input_charset']))
						//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
				        //如"参数名"=>"参数值"
						
				);
				

				//建立请求
				
				$html_text = $this->buildRequestForm($parameter,"get", "确认");
				return $html_text;
	}
	private function alipay_config()
	{
		# code...
		/************************************************************/
			//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

			//签名方式
			$alipay_config['sign_type']    = strtoupper('MD5');

			//字符编码格式 目前支持 gbk 或 utf-8
			$alipay_config['input_charset']= strtolower('utf-8');

			//ca证书路径地址，用于curl中ssl校验
			//请保证cacert.pem文件在当前文件夹目录中
			$alipay_config['cacert']    = getcwd().'cacert.pem';

			//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
			$alipay_config['transport']    = 'http';

			// 支付类型 ，无需修改
			$alipay_config['payment_type'] = "1";
					
			// 产品类型，无需修改
			$alipay_config['service'] = "create_direct_pay_by_user";

			//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


			//↓↓↓↓↓↓↓↓↓↓ 请在这里配置防钓鱼信息，如果没开通防钓鱼功能，为空即可 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
				
			// 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
			$alipay_config['anti_phishing_key'] = "";
				
			// 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
			$alipay_config['exter_invoke_ip'] = "";

			return $alipay_config;

	}
	     /**
	     * 建立请求，以表单HTML形式构造（默认）
	     * @param $para_temp 请求参数数组
	     * @param $method 提交方式。两个值可选：post、get
	     * @param $button_name 确认按钮显示文字
	     * @return 提交表单HTML文本
	     */
		function buildRequestForm($para_temp, $method, $button_name) {
			//待请求参数数组
			$para = $this->buildRequestPara($para_temp);
			
			$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='".$this->alipay_gateway_new."_input_charset=".trim(strtolower($this->config['input_charset']))."' method='".$method."'>";
			while (list ($key, $val) = each ($para)) {
	            $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	        }

			//submit按钮控件请不要含有name属性
	        $sHtml = $sHtml."<input type='submit'  value='".$button_name."' style='display:none;'></form>";
			
			$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
			
			return $sHtml;
		}
		/**
	     * 生成要请求给支付宝的参数数组
	     * @param $para_temp 请求前的参数数组
	     * @return 要请求的参数数组
	     */
		function buildRequestPara($para_temp) {
			//除去待签名参数数组中的空值和签名参数
			$para_filter = array();
			while (list ($key, $val) = each ($para_temp)) {
				if($key == "sign" || $key == "sign_type" || $val == "")continue;
				else	$para_filter[$key] = $para_temp[$key];
			}


			//对待签名参数数组排序
	        ksort($para_filter);
			reset($para_filter);
			

			//生成签名结果
			$mysign = $this->buildRequestMysign($para_filter);
			
			//签名结果与签名方式加入请求提交参数组中
			$para_filter['sign'] = $mysign;
			$para_filter['sign_type'] = strtoupper(trim($this->config['sign_type']));
			
			return $para_filter;
		}
		/**
		 * 生成签名结果
		 * @param $para_sort 已排序要签名的数组
		 * return 签名结果字符串
		 */
		function buildRequestMysign($para_filter) {
			//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
			$prestr = $this->createLinkstring($para_filter);
			
			$mysign = "";
			switch (strtoupper(trim($this->config['sign_type']))) {
				case "MD5" :
					$mysign = $this->md5Sign($prestr, $this->config['key']);
					break;
				default :
					$mysign = "";
			}
			
			return $mysign;
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
	function md5Sign($prestr, $key) {
		$prestr = $prestr . $key;
		return md5($prestr);
	}
}