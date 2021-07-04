<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>皮皮虾文章cms后台管理</title>
    <meta name="keywords" content="皮皮虾文章cms后台管理">
    <meta name="description" content="皮皮虾文章cms后台管理">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="/statics/admins/images/favicon.ico">
    <link rel="stylesheet" href="/statics/admins/lib/layui-v2.6.3/css/layui.css" media="all">
    <link rel="stylesheet" href="/statics/admins/css/layuimini.css?v=2.0.4.2" media="all">
    <link rel="stylesheet" href="/statics/admins/css/themes/default.css" media="all">
    <link rel="stylesheet" href="/statics/admins/lib/font-awesome-4.7.0/css/font-awesome.min.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('style')
</head>
<body class="layui-layout-body layuimini-all">
@yield('content')
<script src="/statics/admins/lib/jquery-3.4.1/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="/statics/admins/lib/layui-v2.6.3/layui.js" charset="utf-8"></script>
<script src="/statics/admins/js/lay-config.js?v=2.0.0" charset="utf-8"></script>
<script src="/statics/admins/js/public.js" charset="utf-8"></script>
@yield('scripts')
</body>
</html>
