<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Menu;
use App\Tools\Tools;
use DB;
class MenuController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools = $tools;
        $this->request = $request;
    }
    /**
     * 菜单列表
     */
    public function menu_list()
    {
        $first_menu = Menu::where(['type'=>3])->select(['name','id'])->get();
//        dd($first_menu);
        return view('wechat.menulist',['first_menu'=>$first_menu]);
    }
    /**
     * 创建菜单
     */
    public function create_menu()
    {
        $req = $this->request->all();
//        dd($req);
        if($req['type'] == 1){
//            统计一级菜单的数量
            $first_count = Menu::where('type','!=','2')->count();
//            dd($first_count);
            if($first_count >= 3){
                dd("菜单超限");
            }
            Menu::insert([
                'name'=>$req['first_name'],
                'event'=>$req['event'],
                'event_key'=>$req['event_key'],
                'type'=>$req['type'],
//                一级菜单的parent_id为0
                'parent_id'=>0
            ]);
        }elseif($req['type'] == 2){
            $menu_count = Menu::where('parent_id','=',$req['name'])->count();
//            dd($req['name']);
//            dd($menu_count);
            if($menu_count >= 5){
                dd("菜单超限");
            }
            Menu::insert([
                'name'=>$req['second_name'],
                'event'=>$req['event'],
                'event_key'=>$req['event_key'],
                'type'=>$req['type'],
                'parent_id'=>$req['name']
            ]);
        }elseif($req['type'] == 3) {
            $first_count = Menu::where('type', '!=', '2')->count();
            if ($first_count >= 3) {
                dd("菜单超限");
            }
            Menu::insert([
                'name' => $req['first_name'],
                'event' => "",
                'event_key' => "",
                'type' => $req['type'],
                'parent_id' => 0
            ]);
        }
//        $this->load_menu();
        dd();
    }
    /**
     * 加载菜单
     */
    public function load_menu()
    {
        $menu_list = Menu::where(['parent_id'=>0])->get();
        $data = [];
        foreach($menu_list as $v){
            if($v['type'] == 1){
                //没有二级菜单的一级菜单
                if($v['event'] == 'click'){
                    $data['button'][] = [
                        'type'=>'click',
                        'name'=>$v['name'],
                        'key'=>$v['event_key']
                    ];
                }elseif($v['event'] == 'view'){
                    $data['button'][] = [
                        'type'=>'view',
                        'name'=>$v['name'],
                        'url'=>$v['event_key']
                    ];
                }
            }elseif($v['type'] == 3){
                //当前一级菜单下有二级菜单
                $menu = Menu::where(['parent_id'=>$v['id']])->get(); //二级菜单
                $menu_arr = [];
                $menu_arr['name'] = $v['name'];
                foreach ($menu as $vo){
                    if($vo['event'] == 'click'){
                        $menu_arr['sub_button'][] = [
                            'type'=>'click',
                            'name'=>$vo['name'],
                            'key'=>$vo['event_key']
                        ];
                    }elseif($vo['event'] == 'view'){
                        $menu_arr['sub_button'][] = [
                            'type'=>'view',
                            'name'=>$vo['name'],
                            'url'=>$vo['event_key']
                        ];
                    }
                }
                $data['button'][] = $menu_arr;
            }
        }
        echo "<pre>";
        print_r($data);
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_access_token();
        $re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        dd($re);
    }
}
