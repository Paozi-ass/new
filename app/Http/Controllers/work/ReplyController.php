<?php

namespace App\Http\Controllers\work;
use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReplyController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }


    public function user()
    {
        $url = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->tools->get_access_token()."&next_openid=");
//        dd($url);
        $re = json_decode($url,true);
//        dd($re);
//        用户信息
//        $user_url =
//        dd($user_url);

    }
}
