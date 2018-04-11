<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/admin/css/main.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css"/> -->
<!--     <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css"/> -->
    <!-- <script type="text/javascript" src="/admin/layui/layui.js"></script> -->

    <script type="text/javascript" src="/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/admin/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">

            <ul class="top-info-list clearfix">
                <li>管理员：{{Session::get('user')->uname}}</li>
                <li><a href="/admin/resetpass/{{Session::get('user')->id}}">修改密码</a></li>
                <li><a href="/admin/index/logout">退出</a></li>
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
                    <a href="#"><i class="icon-font">&#xe041;</i>分类管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/cate"><i class="icon-font">&#xe005;</i>分类列表</a></li>
                        <li><a href="/admin/cate/create"><i class="icon-font">&#xe008;</i>添加分类</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe048;</i>产品管理</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>产品列表</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe008;</i>添加产品</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe01e;</i>网站留言</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>留言列表</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>公司信息配置</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>查看公司信息</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    @section('content')
    @show
    <!--/main-->
</div>
</body>
</html>