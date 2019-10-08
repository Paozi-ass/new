<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="{{url('zhoukao/index')}}" method="post">
        @csrf
            订单号<input type="text" name="danhao">
            
            订单状态<input type="text" name="desc">
            <input type="submit" value="搜索">
        </form>
        <table border=1>
            <tr>
                <td>订单号</td>
                <td>下单时间</td>
                <td>收货人</td>
                <td>总金额</td>
                <td>应付款</td>
                <td>订单状态</td>
                <td>操作</td>
            </tr>
        @foreach ($dingdan as $v)
            <tr>
                <td>{{$v->d_danhao}}</td>
                <td>{{$v->create_at}}</td>
                <td>{{$v->c_id}}</td>
                <td>{{$v->price}}</td>
                <td>{{$v->d_price}}</td>
                <td>
                @if($v->d_desc==1)已分单，已付款，已发货
                @else 未确认，未付款，未发货
                @endif
                </td>
                <td><a href="{{url('zhoukao/list/'.$v->c_id)}}">查看</a></td>
            </tr>
        @endforeach
        
        </table>
        {{ $dingdan->appends($query)->links() }}
</body>
</html>