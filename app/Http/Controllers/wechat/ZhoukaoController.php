<?php

namespace App\Http\Controllers\wechat;
use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZhoukaoController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }

    public function index()
    {
    //  获取用户的OPENID
    $url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_access_token().'&next_openid=';
    $re = $this->tools->curl_get($url);
    $res = json_decode($re,true);
    // dd($res); 
    return view('wechat.Zhoukao',['data'=>$res['data']['openid']]);   
    }



    public function send()
    {
        // dd($openid);
        $openid = request()->all();
        // dd($openid);
        $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$this->tools->get_access_token();
        // dd($url);
        $data = [
            "touser"=>$openid['openid_'],
            "template_id"=>'OH9PLU6f-Qvwbv5JQSA8XglG7vttOdMDFVQOvd2x6hs',
            'data'=>[
                'first'=>[
                    'value'=>'来了老弟！！'
                ]
            ]
        
        ];
        
        $re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        
        dd($re);
    }
}
