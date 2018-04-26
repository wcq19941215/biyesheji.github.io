<?php
namespace Think\Pay;
class WeChatNotify{
  private $WeChatData;
    /**
   * 
   * 支付结果通用通知
   * @param function $callback
   * 直接回调函数使用方法: notify(you_function);
   * 回调类成员函数方法:notify(array($this, you_function));
   * $callback  原型为：function function_name($data){}
   * $xml = $GLOBALS['HTTP_RAW_POST_DATA'];为接受过来的xml
   */

  public function notify($xml)
  {
    //获取通知的数据
    $msg="OK";
    $xml = $xml;

    //如果返回成功则验证签名
    try {
      $result = $this->Init($xml);
    } catch (WxPayException $e){
      $msg = $e->errorMessage();
      return false;
    }
    
    return call_user_func(array($this, 'NotifyCallBack'), $result);
  }
  /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
  public function Init($xml)
  { 
    
    $values=$this->FromXml($xml);
    $this->WeChatData=$values;
      return $values;
  }
  
    public function FromXml($xml)
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
   * 
   * notify回调方法，该方法中需要赋值需要输出的参数,不可重写
   * @param array $data
   * @return true回调出来完成不需要继续回调，false回调处理未完成需要继续回调
   */
  public function NotifyCallBack($data)
  {

     if ($data["result_code"]!="SUCCESS") {
      # code...
      return false;
     }else{
      $WeChatQuery=new WeChatQuery();
      return $WeChatQuery->Query($data);
     }
    
  }
  public function getValues()
  {
    return $this->WeChatData;
  }
  
}