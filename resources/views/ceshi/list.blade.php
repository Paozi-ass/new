<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{url('ceshi/add')}}">添加</a>
    <table border=1>
        <tr>
            <th>id</th>
            <th>昵称</th>
            <th>身份</th>
            <th>操作</th>
        </tr>
    @foreach ($data as $v)
        <tr>
            <td>{{$v->uid}}</td>
            <td>{{$v->uname}}</td>
            @if($v->shenfen==1) 
            <td>主管</td>
            @else
            <td>库管</td>
            @endif
            <td>
                <a href="{{url('ceshi/shengji/'.$v->uid)}}">升级为主管</a>
                <a href="">禁用</a>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>