<?php
namespace App\Tools;
use Illuminate\Support\Facades\Cache;


class Tools{

    /**
     * 根据openid获取用户的基本新
     * @param $openid
     * @return mixed
     */
    public function get_wechat_user($openid)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_access_token().'&openid='.$openid.'&lang=zh_CN';
        $re = file_get_contents($url);
        $result = json_decode($re,1);
        return $result;
    }




    // 获取access_token
    public function get_access_token()
    {
        $key = 'wechat_access_token';
//        Cache::forget($key);die;
        // 判断缓存是否存在
        if(Cache::has($key)){
            // 取缓存
            $wechat_access_token = Cache::get($key);
        }else{
            // 取不到，掉接口，缓存
            $re = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET'));
            $result = json_decode($re,true);
//             dd($result);
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



       /**
     * 微信素材专用 post
     * @param $url
     * @param $path
     * @return mixed
     */
    public function wechat_curl_file($url,$data)
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


}





?>
