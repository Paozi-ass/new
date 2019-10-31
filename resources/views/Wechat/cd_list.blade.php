<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('cd')}}" method="post">
    @csrf
    <select name="type" id="">
        <option value="1">1</option>{{--        没有二级菜单的一级菜单--}}
        <option value="2">2</option>{{--        二级菜单--}}
        <option value="3">3</option>{{--        有二级菜单的一级菜单--}}
    </select><br>
       <div class="one"> 一级菜单：<input type="text" name="one"><br></div>

        <div class="two" style="display:none">
            一级菜单：<select name="one_t" id="">
                @foreach ($data as $v)
                <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select><br>
            二级菜单：<input type="text" name="two"><br>
        </div>
        <div class="event">事件类型：<select name="event" id="">
                        <option value="click">click</option>
                        <option value="view">view</option>
                    </select><br></div>
       <div class="event_key"> 事件值：<input type="text" name="event_key"><br></div>
    <input type="submit"  value="提交">
</form>
<script src="/jq.js"></script>
<script>
    $(function(){
        $("select[name=type]").change(function(){
            var val=this.value;
            // alert(val);
            if(val==1){
                $(".two").hide();
                $(".one").show();
                $(".event").show();
                $(".event_key").show();
            }else if(val==2){
                $(".two").show();
                $(".one").hide();
                $(".event").show();
                $(".event_key").show();
            }else if(val==3){
                $(".two").hide();
                $(".one").show();
                $(".event").hide();
                $(".event_key").hide();
            }
        });
    });
</script>
</body>
</html>

