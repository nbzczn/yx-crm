<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- 开始头部信息 -->

<head>
    <meta charset="utf-8" />
    <title> {{ $page_title or '' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">
    @yield('meta')

    <!-- 开始全局风格样式 -->
    <link rel="stylesheet" href="{{ asset('vendor/global/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/global/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/global/plugins/simple-line-icons/simple-line-icons.min.css') }}">
    <!-- 结束全局风格样式 -->
    <!-- 开始页面级插件样式 -->

    @yield('style')

    <!-- 结束页面级插件样式  -->
    <!-- 开始主题全局风格 -->
    <link href="{{ asset('vendor/global/css/components.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendor/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- 结束主题全局风格 -->
    <!-- 开始主题布局样式 -->
    <link href="{{ asset('vendor/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- 结束主题布局样式 -->

    @yield('css')

    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- 结束头部信息 -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<!-- 开始头部 -->
<div class="page-header navbar navbar-fixed-top">
    <!-- 开始头部内容 -->
    <div class="page-header-inner ">
        <!-- 开始LOGO -->
        <div class="page-logo">
            <a href="index.html">
            <!-- <img src="{{ asset('vendor/layouts/layout/img/logo.png') }}" alt="logo" class="logo-default" /> -->
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- 结束LOGO -->
        <!-- 开始菜单缩放按钮 -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- 结束菜单缩放按钮 -->
        <!-- 开始头部导航菜单 -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- 开始用户登录后菜单 -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile">{{ Auth::user()->name }}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ url('/logout') }}" data-method="POST" data-confirm="确认退出？">
                                <i class="icon-logout"></i> 退出登录 </a>
                        </li>

                    </ul>
                </li>
                <!-- 结束用户登录后菜单 -->
            </ul>
        </div>
        <!-- 结束头部导航菜单 -->
    </div>
    <!-- 结束头部内容 -->
</div>
<!-- 结束头部 -->
<!-- 开始头部内容分隔区 -->
<div class="clearfix"> </div>
<!-- 结束头部内容分隔区 -->
<!-- 开始内容 -->
<div class="page-container">
    <!-- 开始侧边栏 -->
    <div class="page-sidebar-wrapper">
        <!-- 开始侧边栏 -->
        <!-- 注: 设置data-auto-scroll="false"禁用侧边栏自动滚动/聚焦 -->
        <!-- 注: 改变data-auto-speed="200"来调整子菜单的幻灯片上/下的速度 -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- 开始侧边栏菜单 -->
            <!-- 注: 添加page-sidebar-menu-light样式到page-sidebar-menu后面来开启高亮侧边栏菜单风格（无边框） -->
            <!-- 注：添加page-sidebar-menu-hover-submenu样式到page-sidebar-menu后面来开启高亮（点击显示和手风琴）侧边栏模式 -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px" id="base_menus">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- 开始侧边栏toggle按钮 -->
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                    <!-- 结束侧边栏toggle按钮 -->
                </li>

                <li class="nav-item {{active_class(if_uri('/'))}}">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">首页</span>
                    </a>
                </li>


                <li class="nav-item {{active_class(if_uri('set_password'))}}">
                    <a href="{{ url('/set_password') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">修改密码</span>
                    </a>
                </li>

                <li class="nav-item {{active_class(if_uri('my'))}}">
                    <a href="{{ url('/my') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">待办数据</span>
                    </a>
                </li>
                <li class="nav-item {{active_class(if_uri('my_success'))}}">
                    <a href="{{ url('/my_success') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">成功数据</span>
                    </a>
                </li>
                <li class="nav-item {{active_class(if_uri('my_wait'))}}">
                    <a href="{{ url('/my_wait') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">稍后联系数据</span>
                    </a>
                </li>
                @if(Auth::user()->id == 1)
                <li class="nav-item {{active_class(if_uri_pattern('users*'))}}">
                    <a href="{{ url('/users') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">员工管理</span>
                    </a>
                </li>

                <li class="nav-item {{active_class(if_uri('import'))}}">
                    <a href="{{ url('/import') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">数据导入</span>
                    </a>
                </li>
                <li class="nav-item {{active_class(if_uri('patch'))}}">
                    <a href="{{ url('/patch') }}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">数据分配</span>
                    </a>
                </li>
                @endif

            </ul>
            <!-- 结束侧边栏菜单 -->
        </div>
        <!-- 结束侧边栏 -->
    </div>

    <!-- 结束侧边栏 -->
    <!-- 开始内容 -->
    <div class="page-content-wrapper">
        <!-- 开始内容body -->
        <div class="page-content">
            <!-- 开始内容页面头部-->
            <!-- 开始页面栏 -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="">管理中心</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{ $page_title or '' }}</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <!-- 结束页面栏 -->
            <!-- 开始页面标题-->
            <h3 class="page-title"> {{ $page_title or '' }}
                <small>{{ $page_sub_title or '' }}</small>
            </h3>
            <!-- 结束页面标题-->
            <!-- 结束页面内容头部-->

            @yield('content')
            @yield('modal')

        </div>
    </div>
    <!-- 结束快速侧边 -->
</div>
<!-- 结束内容 -->
<!-- 开始页面底部信息-->
<div class="page-footer">
    <div class="page-footer-inner">
        Copyright © 2017 <a href='http://www.nbzczn.com/'  target="_blank">宁波真诚智能科技有限公司</a>. All rights
        reserved.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- 结束页面底部信息 -->
<!--[if lt IE 9]>
<script src="{{ asset('vendor/global/plugins/respond.min.js') }}"></script>

<script src="{{ asset('vendor/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<!-- 开始核心插件 -->
<script src="{{ asset('vendor/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script><!-- 结束核心插件 -->
<!-- 开始页面级插件 -->

<script src="{{ asset('js/jquery-ujs/rails.js') }}" type="text/javascript"></script>
@yield('plugin')

<!-- 结束页面级插件 -->
<!-- 开始主题全局脚本 -->
<script src="{{ asset('vendor/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- 结束主题全局脚本 -->
<!-- 开始页面级脚本 -->

@yield('script')

<!-- 结束页面级脚本 -->
<!-- 开始主题布局脚本 -->
<script src="{{ asset('vendor/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<!-- 结束主题布局脚本 -->
</body>

</html>