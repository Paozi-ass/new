<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button class="add">添加</button>
    <table border=1>
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>
                <a href="{{url('tag_del')}}?id={{$v['id']}}">删除</a>||
                <a href="{{url('tag_update')}}?id={{$v['id']}}&tag_name={{$v['name']}}">修改</a>||
                <a href="{{url('wechatuser')}}">给用户打标签</a>

            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<script src="/jq.js"></script>
    <script>
        $('.add').click(function(){
            //  alert('111');
            window.location.href="{{url('tagadd')}}";
        })
       
    </script>