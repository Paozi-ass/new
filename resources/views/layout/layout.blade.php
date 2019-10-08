<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}--@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/article.js') }}"></script>
    <style>
		/* .jumbotron{
			margin-top:-20px;
		}
		.collapse{
			background:black;
			width:100%;
		}
		.container{
			margin-left:-14px;
			margin-top:-30px;
		}
		.nav{
			color:white;
		} */
	</style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">首席执行官</a>
    </div>

    <!-- 导航栏 -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">文章</a></li>
        <li><a href="#">社区</a></li>
        <li><a href="#">动态</a></li>
        <li><a href="#">留言</a></li>
        @guest
        <li><a href="{{ route('login') }}">登录</a></li>
        @endguest
        @auth
        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="logouts";">
                                       
                                        {{ __('Logouts') }}
                                    </a>


                                    
                                </div>
                            </li>
        @endauth
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- 巨幕 -->
<div class="jumbotron">
  <h1>德玛西亚，永世长存！</h1>
  <p>————盖伦阁下</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
<!-- 左边菜单 -->
<div class="container">

    <div class="col-md-3">
      <div class="list-group">
  <a href="#" class="list-group-item active"> 导航菜单 </a>
  <a href="{{url('project/index')}}" class="list-group-item">文章列表</a>
  <a href="{{url('project/add')}}" class="list-group-item">文章添加</a>
      </div>
    </div>
  <!-- 右边的内容区域 -->
    <div class="col-lg-9">

<!-- 列表展示视图动作 -->
@yield('list')

<!-- 文章添加视图动作 -->
@yield('add') 
<!-- 查看文章内容 -->
@yield('content')
 </div>
 
</div>

</ul>

</body>
</html>
