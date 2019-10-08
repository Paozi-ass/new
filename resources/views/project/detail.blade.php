@extends('layout.layout')

@section('content')
<div>
<div class="panel panel-default">
  <div class="panel-heading">文章详情</div>
  <div class="panel-body">
    Panel content
 
    <table class="table">
            <tr>
                <td>id</td>
                <td>{{$data->id}}</td>
            </tr>
            <tr>
                <td>标题</td>
                <td>{{$data->t_title}}</td>
            </tr>
            <tr>
                  <td>作者</td> 
                  <td>{{$data->t_man}}</td> 
            </tr>
            <tr>
                  <td>图片</td> 
                  <td>@if($data->t_file)<img src="{{ asset('storage/'.$data->t_file) }}" width="100px">
                        @else 暂无
                        @endif
                  </td> 
            </tr>
            <tr>
                <td>添加时间</td>
                <td>{{$data->create_at}}</td>
            </tr>
            <tr>
                <td>更新时间</td>
                <td>{{$data->update_at}}</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>{!! $data->t_content !!}</td>
            </tr>
    </table>
    </div>
</div>
</div>
@endsection