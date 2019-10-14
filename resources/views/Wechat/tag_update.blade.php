<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('tag_update_do')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$tag_id}}">
        标签添加：<input type="text" name="name" value="{{$tag_name}}"></br>
        <input type="submit" value="修改">

    </form>
</body>
</html>