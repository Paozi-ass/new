<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('student/add')}}" method="post">
    @csrf
        姓名：<input type="text" name="name"><br>
        性别：<input type="radio" name="sex" value=1>男
            <input type="radio" name="sex" value=2>女<br>
        年龄：<input type="number" name="age"><br>
        <input type="submit" value="添加">


    </form>
</body>
</html>