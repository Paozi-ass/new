<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{url('ceshi/list')}}">列表</a>
    <form action="{{url('ceshi/add')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>昵称</td>
            <td><input type="text" name="uname">@php echo $errors->first('uname') @endphp</td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="upwd">@php echo $errors->first('upwd') @endphp</td>
        </tr>
        <tr>
            <td>身份</td>
            <td>
                <select name="shenfen" id="">
                    <option value="1">主管</option>
                    <option value="2">库管</option>
                </select>
            </td>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </tr>
    </table>
    </form>
</body>
</html>