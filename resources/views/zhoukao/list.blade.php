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
            <h1>收货人信息</h1>
            <tr>
                <td>收货人</td>
                <td>地址</td>
                <td>电话</td>
                <td>电子邮箱</td>
                <td>手机</td>
            </tr>
            @foreach ($data as $v)
            <tr>
                <td>{{$v->c_name}}</td>
                <td>{{$v->c_dizhi}}</td>
                <td>{{$v->c_phone}}</td>
                <td>{{$v->c_mail}}</td>
                <td>{{$v->c_tel}}</td>
            </tr>
            @endforeach
    </table>

    <table border=1>
        <h1>商品信息</h1>
        <tr>
            <td>商品名称</td>
            <td>货号</td>
            <td>价格</td>
            <td>库存</td>
            <td>数量</td>
           
        </tr>
        @foreach ($good as $v)
        <tr>
            <td>{{$v->g_name}}</td>
            <td>{{$v->g_huohao}}</td>
            <td>{{$v->g_price}}</td>
            <td>{{$v->g_kucun}}</td>
            <td>{{$v->g_num}}</td>
            
        </tr>
        @endforeach
    </table>
</body>
</html>