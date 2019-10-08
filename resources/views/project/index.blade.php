@extends('layout.layout')

@section('title')
我的首页
@endsection

@section('list')

<!-- 添加成功提示 -->
@if (session()->has('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<a href="{{url('project/add')}}" class='glyphicon glyphicon-plus'></a>
<div>

    <table class="table">
        <tr>
            <th>编号</th>
            <th>标题</th>
            <th>作者</th>
            <th>缩略图</th>
            <th>内容</th>
            <th>操作</th>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->t_id}}</td>
            <td>{{$v->t_title}}</td>
            <td>{{$v->t_man}}</td>
            <td><img src="{{ asset('storage/'.$v->t_file) }}" width="100px"></td>
            <td>{{$v->t_content}}</td>
            <td><a href="{{route('detail',['id'=>$v->t_id])}}" class="glyphicon glyphicon-search"></a>||<a href="{{url('project/edit/'.$v->t_id)}}" class="glyphicon glyphicon-pencil"></a>
            ||<a href="{{url('project/delete/'.$v->t_id)}}" class="glyphicon glyphicon-trash"></a></td>
        </tr>
        @endforeach
</table>
</div>
<div>{{ $data->links() }} </div>
@endsection

