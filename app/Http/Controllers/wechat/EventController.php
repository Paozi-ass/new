<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;

class EventController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }

    public function event()
    {
        // echo $_GET['echostr'];
        // dd (11111);
        // php://input是一个只读信息流，当请求方式是post的，并且enctype不等于”multipart/form-data”时，可以使用php://input来获取原始请求的数据
        $info = file_get_contents("php://input");
        // dd($info);
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),$info,FILE_APPEND);
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);

        // simplexml_load_string转换形式良好的 XML 字符串为 SimpleXMLElement 对象，然后输出对象的键和元素
        $xml_obj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        $xml_arr = (array)$xml_obj;
        // dd($this->tools->get_wechat_user($xml_arr['FromUserName']));
//         dd($xml_arr['MsgType']);
        // 关注操作
            if($xml_arr['MsgType']=="event" && $xml_arr['Event']=="subscribe"){
//                 dd($xml_arr['FromUserName']);
                $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
//                 dd($wechat_user);
                $msg = '你好'.$wechat_user['nickname'].'欢迎关注我的公众号!
                        发送1 回复本班讲师名字
                        发送2 回复本班讲师帅照';

                echo "<xml>
              <ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
                    <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
                    <CreateTime>".time()."</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[".$msg."]]></Content>
                    </xml>";
            }

        // 普通操作
        if($xml_arr['MsgType']=="text" && $xml_arr['Content']=="1")
        {
            $msg = "闫小璐咋！闫小璐牛逼！！！";
            echo"<xml>
            <ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
            <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
            <CreateTime>".time()."</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[".$msg."]]></Content>
          </xml>";
        }
//    图片回复
        if($xml_arr['MsgType']=="text" && $xml_arr['Content']=="2")
        {
            $url ="C:\Users\闫小璐\Pictures\Saved Pictures\timg.jpg";
            echo"<xml>
              <ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
              <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
              <CreateTime>".time()."</CreateTime>
              <MsgType><![CDATA[image]]></MsgType>
              <PicUrl><![CDATA[".$url."]]></PicUrl>
              <MediaId><![CDATA[media_id]]></MediaId>
              <MsgId>1234567890123456</MsgId>
            </xml>";
        }

    }
}
