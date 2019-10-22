<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;
use App\models\Resources;

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



    // public function download()
    // {
    //     $req = $this->request->all();
    //     $url = '';
    // }


    public function upload_do(Request $request)
    {
        $res = request()->all();
        // dd($res);
        $type_arr = ['image'=>1,'voice'=>2,'video'=>3,'thumb'=>4];
        if(!$request->hasFile('resurce')){
            dd("没有文件");
        }
        // dd(request()->file('resurce'));
        $file_obj = request()->file('resurce');//文件名
        // dd($file_obj);
        $file_ext = $file_obj->getClientOriginalExtension();//后缀
        // dd($file_ext);
        $file_name = time().rand(1000,9999).'.'.$file_ext;//重命名
        // dd($file_name);
        $path = $request->file('resurce')->storeAs('wechat/'.$res['type'],$file_name);
        // dd($path);
        $data = [
            'media' =>new\CURLFile(storage_path('app/public/'.$path)),
        ];
        // dd($data);
        // 视频的data
        if($res['type']=="video"){
            $data['description']=[
                'title'=>'标题',
                'introduction'=>'描述',
            ];
            $data['description']=json_encode($data['description'],JSON_UNESCAPED_UNICODE);
        }
        // dd($data);
        // storage_path('app/public/'.$path);
        $url = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$this->tools->get_access_token().'&type='.$res['type'];
        // dd($url);
        $re = $this->tools->wechat_curl_file($url,$data);
        // dd($re);
        $result = json_decode($re,true);
        // dd($result);    

        // 数据库添加
        if (!isset($result['errcode'])){
            Resources::create([
                'media_id'=>$result['media_id'],
                'type' => $type_arr[$res['type']],
                'path'=>'/storage/'.$path,
                'addtime'=>time()
            ]);
        }
        // dd($result);
        echo"ok";
    }
}
