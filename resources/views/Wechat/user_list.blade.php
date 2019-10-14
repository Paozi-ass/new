<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <tr>
            <td>id</td>
            <td>昵称</td>
            <td>性别</td>
            <td>地址</td>
            <td>头像</td>
        </tr>
        @foreach( $list as $v)
        <tr>
            <td>{{$v['subscribe']}}</td>
            <td>@if($v['sex']==1)男
                @else 女
                @endif
            </td>
            <td>{{$v['nickname']}}</td>
            <td>{{$v['country']}}{{$v['province']}}{{$v['city']}}</td>
            <td><img src="{{$v['headimgurl']}}" ></td>
        </tr>
        @endforeach
    </table>
</body>
</html>