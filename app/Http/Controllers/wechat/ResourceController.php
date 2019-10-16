<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;

class ResourceController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }

    public function upload()
    {
        return view('wechat.Resurce.upload');
    }


    public function upload_do(Request $request)
    {
        $res = request()->all();
        // dd($res);
        if(!request()->hasFile($res)){
            dd("没有文件");
        }
        // dd(request()->file('resurce'));
        $file_obj = request()->file('resurce');
        // dd($file_obj);
        $file_ext = $file_obj->getClientOriginalExtension();
        // dd($file_ext);
        $file_name = time().rand(1000,9999).'.'.$file_ext;
        // dd($file_name);
        $path = $request->file('resurce')->storeAs('wechat/voice',$file_name);
        // dd($path);
        // storage_path('app/public/'.$path);
        $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->tools->get_access_token().'&type='.$res['type'];
        // dd($url);
        $re = $this->tools->wechat_curl_file($url,storage_path('app/public/'.$path));
        // dd($re);
        $result = json_decode($re,true);
        dd($result);
    }
}
