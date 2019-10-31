<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\models\Menu;
class CaidanController extends Controller
{
    public function cd_list()
    {
        $one_t = Menu::where(["parent_id" => 0, "type" => 3])->get();
//        dd($one_t);
        return view('Wechat.cd_list', ['data' => $one_t]);
    }

    public function cd()
    {

        $res = request()->all();
//        dd($res);
        if ($res['type'] == 1) {
//            dd(11);
            $count = Menu::where("type", "!=", 2)->count();
//            dd($count);
            if ($count >= 3) {
                dd('一级菜单超限');
            }
            Menu::insert([
                "name" => $res['one'],
                "type" => $res['type'],
                "event" => $res['event'],
                "event_key" => $res['event_key'],
                "parent_id" => 0
            ]);

        }else if($res['type']==2){


            $count = Menu::where("type", "==", 2)->count();
//            dd($count);
            if ($count >= 5) {
                dd('菜单超限,不能超过5个');
            }
            Menu::insert([
                    "name"=>$res['two'],
                    "type"=>$res['type'],
                    "event"=>$res['event'],
                    "event_key"=>$res['event_key'],
                    "parent_id"=>$res['one_t'],
            ]);

        }else if($res['type']==3){
                        $count = Menu::where("type","!=",2)->count();
        //            dd($count);
                        if($count>=3){
                            dd('一级菜单超限');
                        }
                      $re =  Menu::insert([
                            "name"=>$res['one'],
                            "type"=>$res['type'],
                            "event"=>"",
                            "event_key"=>"",
                            "parent_id"=>0
                        ]);

        }
        dd();
    }



}

