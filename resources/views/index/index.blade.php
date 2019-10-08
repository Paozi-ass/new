@extends('layouts.index')
@section('content')

<!--主体-->
<div class='weui-content'>
  <!--顶部轮播-->
  <div class="swiper-container swiper-banner">
    <div class="swiper-wrapper">
    @foreach ($data as $v)
      <div class="swiper-slide" id='{{$v->g_id}}'><a href="{{url('index/info')}}"><img src="{{asset('storage/'.$v->g_img)}}" /></a></div>
     @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <!--图标分类-->
  <div class="weui-flex wy-iconlist-box">
    <div class="weui-flex__item"><a href="pro_list.html" class="wy-links-iconlist"><div class="img"><img src="/static/images/icon-link1.png"></div><p>精选推荐</p></a></div>
    <div class="weui-flex__item"><a href="pro_list.html" class="wy-links-iconlist"><div class="img"><img src="/static/images/icon-link2.png"></div><p>酒水专场</p></a></div>
    <div class="weui-flex__item"><a href="all_orders.html" class="wy-links-iconlist"><div class="img"><img src="/static/images/icon-link3.png"></div><p>订单管理</p></a></div>
    <div class="weui-flex__item"><a href="Settled_in.html" class="wy-links-iconlist"><div class="img"><img src="/static/images/icon-link4.png"></div><p>商家入驻</p></a></div>
  </div>
  <!--新闻切换-->
  <div class="wy-ind-news">
    <i class="news-icon-laba"></i>
    <div class="swiper-container swiper-news">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="news_info.html">热烈祝贺闫同学成为这个。。哎。。这个  算了不祝贺了！</a></div>
        <div class="swiper-slide"><a href="news_info.html">蓝之蓝股份成公司上市</a></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <a href="news_list.html" class="newsmore"><i class="news-icon-more"></i></a>
  </div>
  <!--精选推荐-->
  <div class="wy-Module">
    <div class="wy-Module-tit"><span>精选推荐</span></div>
    <div class="wy-Module-con">
      <div class="swiper-container swiper-jingxuan" style="padding-top:34px;">
        <div class="swiper-wrapper">
        @foreach ($data as $v)
          <div class="swiper-slide"><a href="{{url('index/info/'.$v->g_id)}}"><img src="{{asset('storage/'.$v->g_img)}}" /></a></div>
        @endforeach
        </div>
        <div class="swiper-pagination jingxuan-pagination"></div>
      </div>
    </div>
  </div>
  <!--酒水专场-->
  <div class="wy-Module">
    <div class="wy-Module-tit"><span>酒水推荐</span></div>
    <div class="wy-Module-con">
      <div class="swiper-container swiper-jiushui" style="padding-top:34px;">
        <div class="swiper-wrapper">
        @foreach ($data as $v)
          <div class="swiper-slide"><a href="{{url('index/info/'.$v->g_id)}}"><img src="{{asset('storage/'.$v->g_img)}}" /></a></div>
        @endforeach
        </div>
        <div class="swiper-pagination jingxuan-pagination"></div>
      </div>
    </div>
  </div>
  <!--猜你喜欢-->
  <div class="wy-Module">
    <div class="wy-Module-tit-line"><span>猜你喜欢</span></div>
    <div class="wy-Module-con">
   
      <ul class="wy-pro-list clear">
       @foreach ($data as $v)
        <li>
          <a href="{{url('index/info/'.$v->g_id)}}">
            <div class="proimg"><img src="{{asset('storage/'.$v->g_img)}}" width="100px"></div>
            <div class="protxt">
              <div class="name">{{$v->g_name}}</div>
              <div class="wy-pro-pri">¥<span>{{$v->g_price}}</span></div>
            </div>
          </a>
        </li>
      @endforeach
      </ul>
     
      <div class="morelinks"><a href="pro_list.html">查看更多 >></a></div>
    </div>
  </div>
</div>
@endsection
<script src='/jq.js'></script>
 <script>

</script>