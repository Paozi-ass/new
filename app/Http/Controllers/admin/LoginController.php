<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Login;
use Validator;

class LoginController extends Controller
{
    public function login(){
        $model = new Login;
        if(request()->isMethod('POST')){
            $query = request()->except('_token');
            // dd($query);
            $password = $query['password'];
            $pwd = $query['pwd'];
            if($password!=$pwd){
                dd('密码不一致');
            }
            $validator = Validator::make($query, [
                'username' => 'required|unique:logins|max:30',
                'password' =>'required',
                 
             ],[
                 'username.required' => '名称必填',
                 'username.unique' => '名称已有',
                 'username.max' => '字段最大姓名为30位',
                 'password.required'=>'密码必填'
                 
             ]);
             if ($validator->fails()) {
                 return redirect('login/login')
                 ->withErrors($validator)
                 ->withInput();
             }
     
            // dd($query);
            $data = $model->create($query);
            // dd($data);
            if($data){
                return redirect('login/login_do');
            }

            return redirect()->back();
        }
        return view('admin.login');
    }



    public function login_do()
    {   
        $model = new Login;
        if(request()->isMethod('POST')){
            $name = request()->post('username');
            $pwd = request()->post('password');
            $data = $model->where(['username'=>$name])->first()->toArray();
            // dd($data);
            if($data['username']!=$name){
                dd('账号不正确');
            }
            if($data['password']!=$pwd){
                dd('密码不正确');
            }else{
                return redirect('index');
            }
    }
         return view('admin.login_do');
    }
}
