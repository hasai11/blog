<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/admin/css/main.css"/>
    <script type="text/javascript" src="/admin/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="{{ url('admin/index') }}">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li>管理员：{{session()->get('user')->uname}}</li>
                <li><a href="#">修改密码</a></li>
                <li><a href="{{ url('admin/logout') }}">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?m=admin&c=user&a=create"><i class="icon-font">&#xe008;</i>添加用户</a></li>
                        <li><a href="./index.php?m=admin&c=user&a=index"><i class="icon-font">&#xe005;</i>浏览用户</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>类别管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?m=admin&c=cate&a=create"><i class="icon-font">&#xe046;</i>添加分类</a></li>
                        <li><a href="./index.php?m=admin&c=cate&a=index"><i class="icon-font">&#xe045;</i>浏览分类</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?m=admin&c=goods&a=create"><i class="icon-font">&#xe008;</i>添加商品</a></li>
                        <li><a href="./index.php?m=admin&c=goods&a=index"><i class="icon-font">&#xe005;</i>浏览商品</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?m=admin&c=orders&a=index"><i class="icon-font">&#xe005;</i>浏览订单</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @section('content')
    @show
    </div>
 </body>
 </html>