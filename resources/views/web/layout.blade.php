<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章首页</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
{{--    <link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/772f9d61e0b047c7eaad77347e29d4c23e94b63e/css/navy.css'/>--}}
    @yield('style')
</head>
<body class="bg-gray-100">
<header class="bg-gray-700 h-20">
    <div class="container m-auto w-11/12 flex justify-between md:justify-start text-white py-6">
        <div class="text-2xl w-full md:w-1/12 mr-5 text-center md:text-left">
            这是标题
        </div>
        <div class="pt-1 hidden md:block">
            <a href="" class="p-2">首页</a>
            <a href="" class="p-2">php与mysql</a>
            <a href="" class="p-2">服务器交流</a>
            <a href="" class="p-2">前端技术</a>
            <a href="" class="p-2">文章推荐</a>
        </div>
        <div class="md:hidden pt-1 w-7 order-first model-menus">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
    </div>
</header>
<div class="model-menus-list">
    <li><a href="">首页</a></li>
    <li><a href="">php与mysql</a></li>
    <li><a href="">服务器交流</a></li>
    <li><a href="">前端技术</a></li>
    <li><a href="">文章推荐</a></li>
</div>
<main class="w-11/12 m-auto mt-4 flex">
    <div class="w-full md:w-3/4">

        <div class="card md:hidden">
            <div class="flex">
                <input type="text" class="leading-9 border border-solid border-gray-300 pl-1" name="search" value="" placeholder="请输入关键词">
                <button class="bg-green-400 w-14 h-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto stroke-current text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>

        @yield('content')

    </div>
    <div class="w-1/4 hidden md:block">
        <div class="flex">
            <input type="text" class="leading-9 border border-solid border-gray-300 pl-1" name="search" value="" placeholder="请输入关键词">
            <button class="bg-green-400 w-14 h-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto stroke-current text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>

        <div class="w-full bg-white mt-4 shadow-md">
            <div class="pt-3 pl-3 pb-3 border-b border-solid border-gray-300">
                <h4>最近更新</h4>
            </div>
            <div class="nav-list">
                <li ><a href="">uTools插件IPinfo更新，使用更便捷</a></li>
                <li ><a href="">使用Docker搭建poste，自建邮件服务器</a></li>
                <li ><a href="">使用acme.sh申请ZeroSSL泛域名证书，Let’s Encrypt替代品</a></li>
                <li ><a href="">国行小米9 SE刷欧版MIUI 12.5踩坑记录</a></li>
                <li ><a href="">【转载】聊聊 DNS 的那些小知识</a></li>
                <li ><a href="">Debian 10安装Proxmox VE（PVE）虚拟化管理软件</a></li>
                <li ><a href="">开源好用的Windows录屏软件Captura</a></li>
                <li ><a href="">使用WebP Server在不改变URL的情况下将网站图像转换为WebP</a></li>
                <li ><a href="">浅析HTTP 2.0 Server Push，查看是否支持HTTP/2的方法</a></li>
                <li ><a href="">Windows Terminal + Alpine Linux + ZSH打造自己的高颜值终端</a></li>
            </div>
        </div>


    </div>
</main>

<footer class="bg-gray-700 pt-10 pb-10 text-center text-gray-100">
    Copyright © 2013 - 2019.蜀ICP备14021561号 | 川公网安备 51010602000097号 | 站点地图
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function (){
        $(".model-menus").click(function (){
            $('.model-menus-list').fadeToggle();
        });
    })
</script>
@yield('script')
</body>
</html>
