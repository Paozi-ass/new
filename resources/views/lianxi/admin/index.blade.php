<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul.pagination li {
            display: inline;
        }
    </style>

</head>
<body>

<a href="add">添加信息</a>
<form action="index" method="post">
@csrf
    <input type="text" name="name" placeholder="输入姓名查询">
    <input type="text" name="age" placeholder="输入年龄查询">
    <select name="" id="">
        <option value=""></option>
    </select>
    <input type="submit" value='查询'>
</form>
    <table border=1 cellspacing=0>
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>年龄</td>
            <td>性别</td>
            <td>添加时间</td>
            <td>修改时间</td>
            <td>操作</td>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->age}}</td>
            <td>{{$v->sex}}</td>
            <td>{{$v->create_at}}</td>
            <td>{{$v->update_at}}</td>
            <td><a href="">修改</a>||<a href="">删除</a></td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends($query)->links() }}
</body>
</html>