<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('ceshi/login_do')}}" method="post">
@csrf
    <table>
    <h1>登录</h1>
        <tr>
            <td>昵称</td>
            <td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="upwd"></td>
        </tr>
        <tr>
            <td><input type="submit" value = "登录"></td>
        </tr>
    </table>
</form>
</body>
</html>