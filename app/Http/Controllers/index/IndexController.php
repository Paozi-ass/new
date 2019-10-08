<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\GoodsModel;
use Illuminate\support\Facades\Cache;
use App\models\Login;
use Validator;


class IndexController extends Controller
{
    public function register()
    {
        if(request()->isMethod('POST')){
            $model = new Login;
            $post = request()->all();
            // dd($post);
            $validator = Validator::make($post, [
                'username' => 'required|unique:logins|max:30',
                'password' => 'required',
                'usercode'=>'required',
                'userpwd'=>'required',
            ],[
                'username.request'=>'标题必填',
                'username.unique'=>'此账号已有',
                'username.max'=>'最大不能超过30位',
                'password.required'=>'密码必填',
                'usercode.required'=>'验证码必填',
                'userpwd.required'=>'确认密码必填',
            ]);

            if ($validator->fails()) {
                return redirect('index/register')
                ->withErrors($validator)
                ->withInput();
                }
            if($post['password']!=$post['userpwd']){
                echo ('<script> alert("密码不一致");location.href="register";</script>');
                // dd('密码不一致');
                return;
                }
            $data = $model->create($post);
            // dd($data);
            if($data){
                request()->session()->flash('status','注册成功！');
                return redirect('index/login');
            }
            
        }
       return view('index.register');
    }

    public function login()
    {
        return view('index/login');
    }

    public function login_do()
    {
        $username = request()->post('username');
        // dd($username);
        $password = request()->post('password');
        $model = new Login;
        $data = $model->where(['username'=>$username])->first();
        // dd($data);
        if($data='null'){
            echo ('<script> alert("账号不正确");location.href="login";</script>');
        }
        if($data['password']!=$password){
            echo ('<script> alert("密码不正确");location.href="login";</script>');
        }else{
            return redirect('index/index');
        }
        
    }

   public function index()
   {
       $model = new GoodsModel;
       $data = $model->all();
    // dd($data);
       return view("index.index",['data'=>$data]);
   }

//    public function ceshi()
//    {
//        $p = request()->input('page')?? 1;
//        $list = Cache::get('list-'.$p);
//        if(!$list){
//         //    如果没有对应的数据才查询数据表
//         $list = index::orderBy('t_id','desc')->paginate(3);
//         Cache::set('list-'.$p,$list);
//         dd('从数据库中读取');
//        }
//        dd('从缓存中读取');
//    }

   public function info($id)
   {
        // dd($id);
        $model = new GoodsModel;
        $data = $model->find($id);
        // dd($data);
       return view('index.info',['data'=>$data]);
   }

   public function list()
   {
       return view('index/list');
   }
}
