<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border= 1>
        <tr>
            <td>用户名</td>
            <td>二维码</td>
            <td>推广数量</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->uname}}</td>
            <td><img src="{{$v->qrcode}}" alt="150"></td>
            <td>{{$v->share_num}}</td>
            <td><a href="{{url('create_qrcode')}}?id = {{$v->uid}}">生成二维码</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>