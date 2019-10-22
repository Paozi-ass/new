<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <table border=1>
            <tr>
                <td>openid</td>
                <td>操作</td>
            </tr>
            @foreach ($data as $v)
            <tr>
                <td>{{$v}}</td>
                <td><a href="{{url('send?openid ='.$v)}}">发送</a></td>
            </tr>
            @endforeach
        </table>
</form>
</body>
</html>