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
            $msg = "闫小璐";
            echo"<xml>
            <ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
            <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
            <CreateTime>".time()."</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[".$msg."]]></Content>
          </xml>";
        }

//        $url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=".$this->tools->get_access_token();
////        dd($url);
//        $re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
//        dd($re);
//    图文回复
        if ($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == "2") {
            $title="性别：男";
            $description="昵称：Turth";
            $picurl="http://mmbiz.qpic.cn/mmbiz_jpg/BQaPpLPjHiadJ3hBIic3xLE2GbsEcC3u6ZXfadVhUV0I8ts97LpqbIWwVYnxbS7egYib7Uq5ABRCWwa339RlFTMiaA/0?wx_fmt=jpeg";
            $url="https://www.chsi.com.cn/";
            echo "<xml><ToUserName><![CDATA[" . $xml_arr['FromUserName'] . "]]>
            </ToUserName><FromUserName><![CDATA[" . $xml_arr['ToUserName'] . "]]>
            </FromUserName><CreateTime>" . time() . "</CreateTime><MsgType><![CDATA[news]]>
            </MsgType><ArticleCount>1</ArticleCount>
            <Articles><item><Title><![CDATA[".$title."]]></Title>
                <Description><![CDATA[".$description."]]></Description>
                <PicUrl><![CDATA[".$picurl."]]></PicUrl>
            <Url><![CDATA[".$url."]]></Url></item></Articles></xml>";
        }

    }
}
