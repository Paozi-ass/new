<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('create_menu')}}" method="post">
    @csrf
        <table>
            <tr>
                <td>类型：</td>
                <td>
                    <select name="type" id="">
                        <option value="1">1</option><!--没有二级菜单的一级菜单-->
                        <option value="2">2</option><!--二级菜单-->
                        <option value="3">3</option><!--有二级菜单的一级菜单-->
                    </select>
                </td>
            </tr>
            <tr>
                <td>一级菜单：</td>
                <td><input type="text" name="first_name"></td>
            </tr>
            <tr>
                <td>二级菜单：</td>
                <td><input type="text" name="second_name"></td>
            </tr>
            <tr>
                <td>事件类型：</td>
                <td>
                <select name="envt" id="">
                    <option value="click">click</option>
                    <option value="view">view</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>值：</td>
                <td><input type="text" name="envt_key"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>