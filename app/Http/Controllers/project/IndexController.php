<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\index;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    public function index()
        {
            $model = new index;
            $data = $model->paginate(3);
            // dd($data);
            return view('project/index',['data'=>$data]);
        } 

    public function add()
    {
        if(request()->isMethod('POST')){
            $model = new index;
            $post = request()->all();
            // dd($post);
            // request()->validate(
            //     ['t_title'=>'required|min:10|max:100',
            //      't_man'=>'required',
            //      't_content'=>'required'],
            //      ['required'=>':attribute 不能为空'],
            //      ['t_title'=>'标题','t_man'=>'作者','t_content'=>'文章内容']  
            // );
            $validator = Validator::make($post, [
                't_title' => 'required|unique:index|max:30',
                't_man' => 'required',
                't_content'=>'required',
                't_file'=>'image'
            ],[
                't_title.required'=>'标题必填',
                't_title.unique'=>'标题已有',
                't_title.max'=>'标题最大不能超过30位',
                't_man.required'=>'作者必填',
                't_content.required'=>'内容不能为空',
                
                't_file.image'=>'内容必须为图片'
            ]);

            if($validator->fails())
             {
                 return redirect('project/add')
                ->withErrors($validator)
                ->withInput();
            }
            // 
            $path="";
            if(request()->hasFile('t_file') && request()->file('t_file')->isValid()){
                $path = Storage::putFile('imgs', request()->file('t_file'));
            }
            
            // dd($path);
            // $dt = request()->all();
            $post['t_file'] = $path;
            // 添加
            $dt = $model->create($post);
            // dd($dt);
            if($dt){
                request()->session()->flash('status',"添加成功,文章id是".$dt->t_id);
                return redirect('project/index');
            }
        }
        return view('project/add');
    }


    public function detail($id)
    {
        $model = new index;
        $data = $model->find($id);
        // dd($data);
        return view('project/detail',['data'=>$data]);
    }


    public function edit($id)
    {
        $model = new index;
        $data = $model->find($id);
        // dd($data);
        return view('project/edit',['data'=>$data]);
    }


    public function update($id)
    {
        // dd($id);
        if(request()->isMethod('POST')){
            $model = new index;
            $post = request()->except('_token');
            // dd($post);
            // request()->validate(
            //     ['t_title'=>'required|min:10|max:100',
            //      't_man'=>'required',
            //      't_content'=>'required'],
            //      ['required'=>':attribute 不能为空'],
            //      ['t_title'=>'标题','t_man'=>'作者','t_content'=>'文章内容']  
            // );
            $validator = Validator::make($post, [
                't_title' => 'required|unique:index|max:30',
                't_man' => 'required',
                't_content'=>'required',
                't_file'=>'image'
            ],[
                't_title.required'=>'标题必填',
                't_title.unique'=>'标题已有',
                't_title.max'=>'标题最大不能超过30位',
                't_man.required'=>'作者必填',
                't_content.required'=>'内容不能为空',
                
                't_file.image'=>'内容必须为图片'
            ]);

            if($validator->fails())
             {
                 return redirect('project/add')
                ->withErrors($validator)
                ->withInput();
            }
            // 
            $path="";
            if(request()->hasFile('t_file') && request()->file('t_file')->isValid()){
                $path = Storage::putFile('imgs', request()->file('t_file'));
            }
            
            // dd($path);
            // $dt = request()->all();
            $post['t_file'] = $path;
            // if(isset($path)){
            //     $post->t_file = $path;
            // }
            // 添加
            $dt = $model->where(['t_id'=>$id])->update($post);
            // dd($dt);
            if($dt){
                
                return redirect('project/index')->with('success','更新成功,文章id为'.$id);
            }
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        // dd($id);
        $model = new index;
        $post = $model->find($id);
        $data = $post->delete();
        if($data){
            return redirect('project/index')->with('success',"删除成功，id为".$id);
        }
        return redirect('project/index')->with('error',"删除失败，id为".$id);
        
    }

    // 退出登录
    public function logouts()
    {
        Auth::guard()->logout();
        return redirect('login');
    }
}
