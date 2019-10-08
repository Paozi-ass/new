<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>注册账号</h1>
    <form action="login" method="post">
    @csrf
    <table border=1>
        <tr>
            <td>账号：</td>
            <td><input type="text" name="username">@php echo $errors->first('username')@endphp</td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="password">@php echo $errors->first('password')@endphp</td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <tr>
            <td><input type="submit" value="注册"></td>
        </tr>
    </table>
    </form>
</body>
</html>