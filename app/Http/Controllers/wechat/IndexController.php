<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function login()
    {
        
    }

    public function index()
    {
        
       //$info = file_get_contents('http://wechat.18022480300.com/wechat/index');
    //    $access_token = $this->get_access_token();
    //    echo $access_token;
    // openid用户标识
    $openid=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->get_access_token().'&next_openid=');
    //    dd($openid);
        $re=json_decode($openid,1);
    //    dd($re);
        $openid_list=[];
        foreach ($re['data']['openid'] as $v)
        {
            $user_info=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_access_token().'&openid='.$v.'&lang=zh_CN');
            $res=json_decode($user_info,1);
    //          dd($res);
            $openid_list[]=$res;
        }
    //    dd($openid_list);
        return view('Wechat.user_list',['list'=>$openid_list]);
    }

    public function get_access_token()
    {
        $key = 'wechat_access_token';
        // 判断缓存是否存在
        if(Cache::has($key)){
            // 取缓存
            $wechat_access_token = Cache::get($key);
        }else{
            // 取不到，掉接口，缓存
            $re = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx04e4d9d383981194&secret=369ec3b2641e4c25ff24e9bbe0163012');
            $result = json_decode($re,true);
            // dd($result);
            Cache::put($key,$result['access_token'],$result['expires_in']);
            $wechat_access_token = $result['access_token'];
        }
        return $wechat_access_token;
    }

    // post请求
    public function curl_post($url,$data)
    {
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);


        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);


        $result=curl_exec($curl);
        curl_close($curl);
        return $result;
    }


    /**
     * curl get传
     * @param $url
     * @return mixed
     */
    public function curl_get($url)
    {
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        $result=curl_exec($curl);
        curl_close($curl);
        return $result;
    }


    // 标签列表
    public function tag_list()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->get_access_token();
       $re = $this->curl_get($url);
       $result = json_decode($re,true);
    //    dd($result);
        return view('wechat.tag_list',['data'=>$result['tags']]);
    }


    // 标签创建（添加）
    public function tag_add()
    {
       
        return view('wechat.tag_add');
    }

    public function tag_add_do(Request $request)
    {
        $req = $request->all();
        // dd($req);
        $url = 'https://api.weixin.qq.com/cgi-bin/tags/create?access_token='.$this->get_access_token();
        $data = [
                'tag' => [
                    'name'=>$req['name']
                ]

        ];
        $re = $this->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        $result = json_decode($re,true);
        // dd($result);
        if($result){
           return redirect('taglist');
        }
    }

    public function tag_update()
    {
        $req = request()->all();
        // dd($req);
        return view('wechat.tag_update',['tag_name'=>$req['tag_name'],'tag_id'=>$req['id']]);
    }

    public function tag_update_do()
    {
        $req = request()->all();
        // dd($req);
        $url = 'https://api.weixin.qq.com/cgi-bin/tags/update?access_token='.$this->get_access_token();
        $data = [
            'tag' => [
                'id' => $req['id'],
                'name' => $req['name']
            ]
        ];
        // dd($data);
        $re = $this->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        // dd($re);
        if($re){
            return redirect('taglist');
        }
    }

    public function tag_del()
    {
        $req = request()->all();
        // dd($req);
        $url = 'https://api.weixin.qq.com/cgi-bin/tags/delete?access_token='.$this->get_access_token();

        $data = [
            'tag'=>[
                'id'=>$req['id']
            ]
        ];

        $re = $this->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        if($re){
            return redirect('taglist');
        }
    }

    public function wechat_user()
    {
        $req = request()->all();
        // dd($req);
        // 获取用户的列表
        $url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->get_access_token().'&next_openid=';
        $re = $this->curl_get($url);

        $result = json_decode($re,true);
        // dd($result['data']['openid']);

        return view('wechat.wechat_user',['data'=>$result['data']['openid']]);
    }

    public function wechat_user_add()
    {
        $req = request()->all();
        dd($req);
    }
     /**
     * 公众号调用或第三方平台帮公众号调用对公众号的所有api调用（包括第三方帮其调用）次数进行清零：
     */
    public function clear_api()
    {
//        echo 11;die;
        $url='https://api.weixin.qq.com/cgi-bin/clear_quota?access_token='.$this->get_access_token();
        $data=['appid'=>env('WECHAT_APPID')];
        $re=$this->curl_post($url,json_encode($data));
        $result=json_decode($re,1);
        dd($result);
    }
}

