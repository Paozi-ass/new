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
        <tbody id="list">
            <tr>
                <td>订单号</td>
                <td>下单时间</td>
                <td>收货人</td>
                <td>总金额</td>
                <td>应付款</td>
                <td>订单状态</td>
                <td>操作</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        </table>
       
</body>
</html>
<script src="{{asset('jq.js')}}"></script>
<script>
    $.ajax({
        url:"http://www.1903.com/zhoukao/index",
        dataType:"json",
        success:function(res){
            $.each(res.data,function(i,v){
                var tr =$("<tr></tr>");
                tr.append("<td>"+v.d_id+"</td>");
                tr.append("<td>"+v.d_danhao+"</td>");
                tr.append("<td>"+v.c_id+"</td>");
                $('#list').append(tr);
            })
        }
    })
</script>