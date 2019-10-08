@extends('layout.layout')

@section('title')
我的首页
@endsection



@section('add')


<!-- 字段错误提示 -->
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<!-- 修改的表单 -->
<form action="{{url('project/edit/'.$data->t_id)}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">标题</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请填写该字段" name="t_title" value="{{old('t_title') ?? $data->t_title ?? ''}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">作者</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="请填写该字段" name="t_man" value="{{old('t_man') ?? $data->t_man ?? ''}}">
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1">缩略图</label>
    <input type="file" class="form-control"  name="t_file" style="display: none;" id="uploadField" >
    <button class="btn btn-warning" id="img" type="button">上传缩略图</button>
    <div class="row" style="padding: 10px;">
      <img src="{{ $data->t_file ? asset('storage/'.$data->t_file) : asset('images/sctp.png') }}" alt="缩略图" class="img-thumbnail" width="150px">
 
    </div>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">内容</label>
    <script id="content" type="text/plain" style="width:824px;height:300px;" name="t_content" value="{{old('t_content') ?? $data->t_content ?? ''}}"></script>
  </div>
  
  
  <button type="submit" class="btn btn-default">修改</button>
</form>
    <script charset="utf-8" src="{{asset('js/ueditor/ueditor.config.js')}}"></script>
    <script charset="utf-8" src="{{asset('js/ueditor/ueditor.all.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('js/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <!-- <script id="editor" type="text/plain" name="gdesc" style="width:100%;height:350px;"></script> -->
    <script type="text/javascript">
        //实例化编辑器
        var ue = UE.getEditor('content');
        var content = "{!! old('t_content') ?? $data->t_content ?? '' !!}";
        ue.ready(function(){
            ue.setContent(content);
        })
    </script>
@endsection