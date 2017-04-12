<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="{{ asset('assets/css/amazeui.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}"/>
  <link rel="stylesheet" href="//cdn.staticfile.org/datatables/1.10.13/css/dataTables.material.min.css">
  <link rel="stylesheet" href="//cdn.staticfile.org/material-design-lite/1.3.0/material.min.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>{{ config('app.name', 'Laravel') }}</strong> <small>{{ Auth::user()->role() }}</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li><a href="#"><span class="am-icon-user"> 用户：{{ Auth::user()->username }} {{ Auth::user()->real_name }}</span></a></li>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"><span class="am-icon-sign-out"></span> 登出 </a></li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>

    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        @if (Auth::user()->role == 1)
          <li><a href="/teacher/courses"><span class="am-icon-balance-scale"></span> 我的课程</a></li>
          <li><a href="/teacher/students"><span class="am-icon-users"></span> 学生列表</a></li>
        @else
          <li><a href="/student/courses"><span class="am-icon-balance-scale"></span> 所有课程</a></li>
          <li><a href="/student/selected"><span class="am-icon-edit"></span> 已选课程</a></li>
        @endif
      </ul>
    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      @yield('content')
    </div>
    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2017 Glzjin. Powered by AmazeUI</p>
    </footer>
  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="//cdn.staticfile.org/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="//cdn.staticfile.org/datatables/1.10.13/js/dataTables.material.min.js"></script>
<!--<![endif]-->
<script src="{{ asset('assets/js/amazeui.min.js') }}"></script>
</body>
</html>
