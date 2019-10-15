<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    
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
    //     dd($xml_arr);
    //     echo"<xml>
    //     <ToUserName><![CDATA[toUser]]></ToUserName>
    //     <FromUserName><![CDATA[fromUser]]></FromUserName>
    //     <CreateTime>12345678</CreateTime>
    //     <MsgType><![CDATA[text]]></MsgType>
    //     <Content><![CDATA[你好]]></Content>
    //   </xml>";
     

    }
}
