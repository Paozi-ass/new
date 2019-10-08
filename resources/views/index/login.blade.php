<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>登陆</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="/static/lib/weui.min.css">
<link rel="stylesheet" href="/static/css/jquery-weui.css">
<link rel="stylesheet" href="/static/css/style.css">
</head>
<body ontouchstart style="background:#323542;">
<!--主体-->
<div class="login-box">
  	<div class="lg-title">欢迎登陆伟义商城</div>
    <div class="login-form">
    	<form action="{{url('index/login_do')}}" method="post">
        @csrf
        	<div class="login-user-name common-div">
            	<span class="eamil-icon common-icon">
                	<img src="/static/images/eamil.png" />
                </span>
                <input type="email" name="username" value="" placeholder="请输入您的邮箱号" />        
            </div>
            <div class="login-user-pasw common-div">
            	<span class="pasw-icon common-icon">
                	<img src="/static/images/password.png" />
                </span>
                <input type="password" name="password" value="" placeholder="请输入您的密码" />        
            </div>
            <input type="submit" class="login-btn common-div" value="登录">
            
        </form>
    </div>
    <div class="forgets">
    	<a href="psd_chage.html">忘记密码？</a>
        <a href="{{url('index/register')}}">免费注册</a>
    </div>
</div>
<script src="lib/jquery-2.1.4.js"></script> 
<script src="lib/fastclick.js"></script> 
<script type="text/javascript" src="js/jquery.Spinner.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>

<script src="js/jquery-weui.js"></script>

</body>
</html>
