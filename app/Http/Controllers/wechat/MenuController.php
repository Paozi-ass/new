<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Menu;

class MenuController extends Controller
{
    public function menu_list()
    {
        return view('wechat.menulist');
    }


    public function create_menu()
    {
        $res = request()->all();
        // dd($res);
       $req = Menu::create(
            [
                'first_name'=>$res['first_name'],
                'second_name'=>empty($res['second_name'])?"":$res['second_name'],
                'envt'=>$res['envt'],
                'envt_key'=>$res['envt_key']
            ]
        );
        dd($req);
        
    }
}
