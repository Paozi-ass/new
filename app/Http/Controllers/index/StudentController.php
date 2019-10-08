<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = request()->input();
        // dd($query);
        $name = request()->post('name')??"";
        $age = request()->post('age')??"";
        $order = request()->post('order');
        $ziduan = request()->post('ziduan')??"id";
        // dd($ziduan);
        // dd($order);
        // dd($query);
        // $name = $query['name'];
        // $age =  $query['age'];
        // dd($age);
        
        $where=[];
       if($name){
           $where[]=['name','like',"%$name%"];
       }
       if($age){
           $where[]=['age','=',$age];
       }
        $pageSize=2;
        if($order==1){
            $data = DB::table('students')->where($where)->orderBy($ziduan,'asc')->paginate($pageSize);
            return view('index/index',compact('data','query','name','age'));
        }else{
            $data = DB::table('students')->where($where)->orderBy($ziduan,'desc')->paginate($pageSize);
            return view('index/index',compact('data','query','name','age'));
        }
       
    }

    public function add()
    {
        if(request()->isMethod('POST')){
			$all = request()->all();
			$res = DB::insert("insert into students (name,age) values (?,?)",[$all['name'],$all['age']]);
			if($res){
				return redirect("/index");
			}
			return redirect()->back();
		}

		return view('index/add');
    }

    // 修改学生
	public function edit(){
        $id = request()->get('id');
        // dd($id);
        $data = DB::select('select * from students where id=?',[$id]);
        // dd($data[0]['id']);
        $data = json_decode(json_encode($data), true);
        // dd($data[0]['id']);
        return view('index/edit',compact('data'));

    }
    
    public function update()
    {
        $data = request()->except('_token');
        // dd($data);
        $id = $data['id'];
        $res = DB::table('students')->where('id',$id)->update($data);
        // dd($res);
        return redirect('index');
    }


	// 删除学生信息
	public function delete(){
        $id = request()->get('id');
        $id=explode(",",$id);
        // dd($id);
        
        $res = DB::table('students')->whereIn('id',$id)->delete();
        return redirect('index');


    }
    

}
