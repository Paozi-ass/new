<?php

namespace App\Http\Controllers\wechat;
use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;
use Illuminate\Support\Facades\Storage;
class WechatController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }

    public function wechat_list()
    {
        $data = user::get();
        // dd($data);
        return view ('wechat.wechatlist',['data'=>$data]);
    }

    public function create_qrcode()
    {
        $res = request()->all();
        // dd($res);
        $url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->tools->get_access_token();
        // {"expire_seconds": 604800, "action_name": "QR_STR_SCENE", "action_info": {"scene": {"scene_str": "test"}}}
        $data = [
            'expire_seconds' => 30 * 24 * 3600,
            'action_name' => 'QR_STR_SCENE',
            'action_info' => [
                'scene'=>[
                    'scene_str'=>$res['id_']
                ]
            ] 
        ];

        $re = $this->tools->curl_post($url,json_encode($data));
        $result = json_decode($re,1);
        // dd($result);
        $qrcode_url = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$result['ticket'];
        // get方式
        $qrcode_source = $this->tools->curl_get($qrcode_url);
        // dd($qrcode_source);
        $path = $res['id_'].rand(10000,99999).'jpg';
        Storage::put('wechat/qrcode/'.$path,$qrcode_source);
        // 修改数据库
        user::where(['uid'=>$res['id_']])->update([
            'qrcode'=>'/storage/wechat/qrcode/'.$path
        ]);
        return redirect('/wechat_list');
    }
}
