<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(isset($article->title) && $article->title != '') {{ $article->title }} -@endif @if(isset($cate->name)){{ $cate->name }} -@endif{{ $website->name }}</title>
    <meta name="description" content="{{ $website->description }}" />
    <meta name="keywords" content="{{ $website->keywords }}" />
    @if(isset($article->title) && $article->title != '')
    <meta property="og:locale" content="zh_CN">
    <meta property="og:type" content="article" />
    <meta property="article:published_time" content="{{ $article->created_at }}" />
    <meta property="article:author" content="{{ $article->user_id  }}" />
    <meta property="article:published_first" content="MinP.Me, https://www.minp.me/archives/15.html" />
    <meta property="og:title" content="WordPress自动获取文章第一张图片作为缩略图支持外链图片 - MinP.Me" />
    <meta property="og:url" content="https://www.minp.me/archives/15.html" />
    @endif

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
{{--    <link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/772f9d61e0b047c7eaad77347e29d4c23e94b63e/css/navy.css'/>--}}
    @yield('style')
</head>
<body class="bg-gray-100">
<header class="bg-gray-700 h-20">
    <div class="container m-auto w-11/12 flex justify-between md:justify-start text-white py-6">
        <div class="text-2xl w-full md:w-1/12 mr-5 text-center md:text-left">
            {{ $website->name }}
        </div>
        <div class="pt-1 hidden md:block">
            <a href="" class="p-2">首页</a>
            @foreach($cate as $item)
            <a href="{{ $website->url }}/cate/{{ $item->code }}" class="p-2">{{ $item->name }}</a>
            @endforeach
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
    @foreach($cate as $item)
        <li><a href="{{ $website->url }}/cate/{{ $item->code }}" class="p-2">{{ $item->name }}</a></li>
    @endforeach
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
                <h4>本周最热</h4>
            </div>
            <div class="nav-list">
                @foreach($week_host as $item)
                <li ><a href="{{ $website->url }}/article/{{ $item->id }}.html" target="_blank" title="{{ $item->title }}" rel="{{ $item->title }}">{{ $item->title }}</a></li>
                @endforeach
            </div>
        </div>


    </div>
</main>

<footer class="bg-gray-700 pt-10 pb-10 text-center text-gray-100">
    Copyright © 2013 - {{ now()->format('Y') }} {{ $website->name }} | <a href="">站点地图</a>
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
