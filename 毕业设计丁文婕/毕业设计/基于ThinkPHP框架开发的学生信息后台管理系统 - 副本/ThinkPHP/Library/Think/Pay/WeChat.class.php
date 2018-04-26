<?php
namespace Think\Pay;
use Think\Config;
/**
* 
*/
class WeChat
{
	private $config;

	public function __construct()
	{

		$this->config=C('WECHAT');


	}
	  // 参数数组转换为url参数
	public function ToUrlParams($data)
	{
	    $buff = "";
	    foreach ($data as $k => $v)
	    {
	      if($k != "sign" && $v != "" && !is_array($v)){
	        $buff .= $k . "=" . $v . "&";
	      }
	    }
	    
	    $buff = trim($buff, "&");
	    return $buff;
	}
  
	//设置签名
	function SetSign($data){
	    $sign = $this->MakeSign($data);
	    return $sign;
	}
	//生成签名
	function MakeSign($data){
	    //签名步骤一：按字典序排序参数
	    ksort($data);
	    $string = $this->ToUrlParams($data);
	    //签名步骤二：在string后加入KEY
	    $string = $string."&key=".$this->config['key'];
	    //签名步骤三：MD5加密
	    $string = md5($string);
	    //签名步骤四：所有字符转为大写
	    $result = strtoupper($string);
	    return $result;

	}
	function getNonceStr($length = 32) {//随机字符串
	        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
	        $str ="";
	        for ( $i = 0; $i < $length; $i++ )  {  
	            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
	        } 
	        return $str;
	}
	//数组转xml格式
    function ToXml($data){
      
        $xml = "<xml>";
        foreach ($data as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml; 
    }
/**
   * 以post方式提交xml到对应的接口url
   * 
   * @param string $xml  需要post的xml数据
   * @param string $url  url
   * @param bool $useCert 是否需要证书，默认不需要
   * @param int $second   url执行超时时间，默认30s
   * @throws WxPayException
   */
	function postXmlCurl($xml, $url, $useCert = false, $second = 30){   
	    $ch = curl_init();
	    //设置超时
	    curl_setopt($ch, CURLOPT_TIMEOUT, $second);
	    
	    //如果有配置代理这里就设置代理
	  
	    curl_setopt($ch,CURLOPT_URL, $url);
	    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
	    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);//严格校验2
	    //设置header
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    //要求结果为字符串且输出到屏幕上
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	     if($useCert == true){
	      //设置证书
	      //使用证书：cert 与 key 分别属于两个.pem文件
	      curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
	      curl_setopt($ch,CURLOPT_SSLCERT, 'http://www.nmwxpay.com/cert/apiclient_cert.pem');
	      curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
	      curl_setopt($ch,CURLOPT_SSLKEY, 'http://www.nmwxpay.com/cert/apiclient_key.pem');
	    }
	    //post提交方式
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	    //运行curl
	    $data = curl_exec($ch);
	    //返回结果
	    if($data){
	      curl_close($ch);
	      return $data;
	    } else { 
	      $error = curl_errno($ch);
	      curl_close($ch);
	    }
	}
    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	function Init($xml)
	{ 
	    
	    $values=$this->FromXml($xml);
	    //fix bug 2015-06-29
	    return $values;
	}
  
    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	function FromXml($xml)
	{ 
      if(!$xml){
        echo "xml数据异常！";
      }
      //将XML转为array
      //禁止引用外部xml实体
      libxml_disable_entity_loader(true);
      $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);    
      return $values;
    }
    /**
	* @param $list 参数数组  set描述,indent订单号,money金额,userid用户id,
    */
	function send($list)
	{
	    # code...
	        $body=$list["set"];
	        $attach=$list["set"];
	        $out_trade_no=$list["indent"];
	        $total_fee=$list["money"]*100;
	        $product_id=$list["userid"];
	        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
	        $data = array();
	        $data["body"]=$body;//商品描述
	        $data["attach"]=$attach;//附加数据
	        $data["out_trade_no"]=$out_trade_no;//商户订单号
	        $data["total_fee"]=$total_fee;//订单金额
	        $data["time_start"]=date("YmdHis");//交易起始时间
	        $data["time_expire"]=date("YmdHis",time()+3600*24);//交易结束时间
	        //$data["goods_tag"]="充值";//商品标记
	        $data["notify_url"]=$this->config['notify_url'];//通知地址
	        $data["trade_type"]="NATIVE";//交易类型
	        $data["product_id"]=$product_id;//用户id
	        $data["appid"]=$this->config['appid'];//绑定支付的APPID
	        $data["mch_id"]=$this->config['mch_id'];//商户号
	        //$data["device_info"]=$_SERVER['REMOTE_ADDR'];//设备号
	        $data["nonce_str"]=$this->getNonceStr();//随机字符串
	        $data['sign']=$this->SetSign($data);//签名
	        $xml = $this->ToXml($data);
	        $timeOut=6;
	        $response =$this->postXmlCurl($xml, $url, false, $timeOut);
	        $result = $this->Init($response);
	        $url2 = $result["code_url"];
	        return $url2;
	        
	}
  function zx()
  {
    # code...
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $data = array();
        $data["body"]="测试";//商品描述
        $data["attach"]="测试";//附加数据
        $data["out_trade_no"]="2016092679522";//商户订单号
        $data["total_fee"]=1;//订单金额
        $data["time_start"]=date("YmdHis");//交易起始时间
        $data["time_expire"]=date("YmdHis",time()+3600*24);//交易结束时间
        //$data["goods_tag"]="充值";//商品标记
        $data["notify_url"]="http://www.ysxk.loan/Notify.php";//通知地址
        $data["trade_type"]="NATIVE";//交易类型
        $data["product_id"]="1";//用户id
        $data["appid"]="wxdc5f0f1f70fbc5f5";//绑定支付的APPID
        $data["mch_id"]="1398104202";//商户号
        //$data["device_info"]=$_SERVER['REMOTE_ADDR'];//设备号
        $data["nonce_str"]=$this->getNonceStr();//随机字符串
        $data['sign']=$this->SetSign($data);//签名
        $xml = $this->ToXml($data);
        $timeOut=6;
        $response =$this->postXmlCurl($xml, $url, false, $timeOut);
        $result = $this->Init($response);
        $url2 = $result["code_url"];
        echo $url2;
        //echo $result["result_code"];
        echo '<img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data='.$url2.'" style="width:150px;height:150px;"/>';

  }

}