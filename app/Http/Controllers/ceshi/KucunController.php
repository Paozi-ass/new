<?php

namespace App\Http\Controllers\ceshi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\models\user;

class KucunController extends Controller
{
    public function login()
    {
        return view('ceshi/login');
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
        if($data['shenfen']==1){
            return redirect('ceshi/list');
        }else{
            return redirect('ceshi/add');
        }
    }

    public function add()
    {
        if(request()->isMethod('POST')){
            $post = request()->except('_token');
            // dd($post);
            $validator = Validator::make($post, [
                'uname' => 'required|unique:user|max:30',
                'upwd' => 'required',
            ],[
                'uname.required'=>'昵称不能为空',
                'uname.unique'=>'该昵称已拥有',
                'uname.max'=>'昵称最大不能超过30位',
                'upwd.required'=>'密码不能为空',
            ]);
            
            if ($validator->fails()) {
                return redirect('ceshi/add')
                ->withErrors($validator)
                ->withInput();
                }
                $model = new user;
            $data = $model->create($post);
            // dd($data);
            if($data){
                request()->session()->flash('status','添加成功');
                return redirect('ceshi/list');
            }
        }
        return view('ceshi/add');
    }


    public function list()
    {
        $model = new user;
        $data = $model->all();
        return view('ceshi/list',['data'=>$data]);
    }

    public function shengji($id)
    {
        // dd($id);
        $model = new user;
        $update = $model->where(['uid'=>$id])->update(['shenfen'=>1]);
        // dd($update);
        if($update){
            return redirect('ceshi/list');
        }
    }

    public function huoadd()
    {
        if(request()->isMethod('POST')){
            
        }
        return view('ceshi/huoadd');
    }



}
