<?php

namespace App\Http\Controllers\zhoukao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;
use App\models\dingdan;
use App\models\consignee;
use App\models\GoodsModel;
class UserController extends Controller
{
    public function login()
    {
        return view('zhoukao/login');
    }

    public function login_do()
    {
        $name = request()->post('uname');
        $pwd = request()->post('upwd');
        $model = new user;
        $data = $model->where(['uname'=>$name])->first();
        // dd($data);
        if($data['upwd']!=$pwd){
            echo ('<script>alert("密码不一致");location.href="login";</script>');
        }
        
        if($data){
            return redirect('zhoukao/index');
        }
    }

    public function index()
    {
        $dingmodel = new dingdan;
        $goods = new GoodsModel;
        $query = request()->except('_token');
        $danhao = $query['danhao']??"";
        $where = [];
        if($danhao){
            $where[]=['d_danhao','=',$danhao];
        }
        $desc = $query['d_desc']??'';
        if($desc){
            $where[]=['d_desc','=',$desc];
        } 
       
        $dingdan = $dingmodel->where($where)->paginate(1);
        // dd($dingdan);
        return view('zhoukao/index',compact('query','danhao','desc','dingdan'));
    }

    public function list($id)
    {
        // dd($id);
        $goods = new GoodsModel;
        $dingmodel = new dingdan;
        $man = new Consignee;
        $data = $man->where(['c_id'=>$id])->get();
        
        $id = $dingmodel->where(['c_id'=>$id])->first();
        // dd($id);
        $gid=$id['g_id'];
        // dd($id);
        $good = $goods->where(['g_id'=>$gid])->get();
        // dd($good);
        return view('zhoukao/list',['data'=>$data],['good'=>$good]);
    }


    // public function search()
    // {
    //     $dingdan = new dingdan;
    
    //     $search = $dingdan->where($where)->all();
    // }

}
