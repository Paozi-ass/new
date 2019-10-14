<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('wechat_user_add')}}" method="post">
    @csrf
        <table border="1">
        <tr>
            <td></td>
            <td>openid</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td><input type="checkbox" name="openid_list[]" value="{{$v}}"></td>
            <td>{{$v}}</td>
            <td>
                <a href="">查看用户的标签</a>
            </td>
        </tr>
        @endforeach
        </table>
        <input type="submit" value="提交">
    </form>
</body>
</html>