<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\StudentModel;

class StudentController extends Controller
{
    public function index()
    {
        $query=request()->input();
        // dd($query);
        $name = request()->post('name')??"";
        // dd($name);
        $age = request()->post('age')??"";
        $where=[];
        if($name){
             $where[]=["name","like","%$name%"];
        }
       if($age){
        $where[]=["age","=","$age"];
       }
        $model = new StudentModel;
        $data = $model->where($where)->paginate(2);
        // dd($data);
        return view('admin/index',compact('data','query'));
    }

    public function add()
    {
        $model = new StudentModel;
        if(request()->isMethod('POST')){
            $all= request()->except('_token');
            // dd($all);
            $data = $model->create($all);
            // dd($data);
            if($data){
                return redirect('student/index');
            }
            return redirect()->back();
        }
        return view('admin/add');
    }

    public function edit()
    {
        
    }



    public function model()
    {
        $model = request()->session()->put('username','张春雨');
        $zhang = request()->session()->put('pwd','侯永刚');
        $z = session(['name'=>'张']);

    }

    public function session()
    {
        $session = request()->session()->all();
        dd($session);
    } 
}
