<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('ceshi/add')}}" method="post">
        <table border=1>
            <tr>
                <td>名称</td>
                <td><input type="text" name="h_name"></td>
            </tr>
            <tr>
                <td>货物图片</td>
                <td><input type="text" name="h_img"></td>
            </tr>
            <tr>
                <td>货物数量</td>
                <td><input type="text" name="h_num"></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
            </tr>
        </table>
    </form>
</body>
</html>