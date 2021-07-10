@extends('web.layout')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prism-themes@1.7.0/themes/prism-coldark-dark.css" integrity="sha256-KKJ2D9O+VHGHuPqcTEjsAROBPaQQU1E62PF6QXM0s3s=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/line-numbers/prism-line-numbers.css" integrity="sha256-ye8BkHf2lHXUtqZ18U0KI3xjJ1Yv7P8lvdKBt9xmVJM=" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css" integrity="sha256-h/qtq9bUnXbOOwP4EcbLtYM9Mk3iQQcHZAZ+Jz5y0WQ=" crossorigin="anonymous">--}}
@endsection
@section('content')
    <div class="w-cart-width">
        <div class="bg-gray-50 leading-10 pl-3 text-gray-500 text-sm border-b border-solid border-gray-300">
            你的位置：{{ $website->name }} > {{ $article->cate->name }} > {{ $article->title }}
        </div>
        <div class="bg-white pt-2 pl-3 pb-3 border-b border-solid border-gray-200">
            <h3 class="text-xl text-gray-600">{{ $article->title }}</h3>
            <div class="flex text-gray-500 mt-2 text-sm">
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                    </svg>
                </span>
                    {{ $article->cate->name }}
                </div>
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                    {{ $article->user->name }}
                </div>
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                    {{ $article->created_at }}
                </div>
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
                    {{ $article->show }}
                </div>
            </div>
        </div>
        <article class="article_content bg-white pl-3 pr-3 pt-3 pb-5">
            {!! $article->content !!}
            <div class="flex mt-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
</svg>
                </span>
                <div>标签：
                    <a href="" class="p-2 bg-green-200">中文</a>
                    <a href="" class="p-2 bg-green-200">英文</a>
                    <a href="" class="p-2 bg-green-200">日本文</a>
                    <a href="" class="p-2 bg-green-200">玛丽亚过了</a>
                </div>
            </div>
        </article>
        <div class="bg-gray-50 md:flex md:justify-between leading-10 px-3 border-b border-solid border-gray-100">
            <div class="">上一章</div>
            <div class="">下一章</div>
        </div>
        <div class="bg-white mb-11">
            <div class="leading-10 pl-3 border-b border-solid border-gray-100">
                随机推荐
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 px-3 leading-9">
                <a href="">
                    <span class="text-green-500">
                        *
                    </span>
                    这里
                </a>
                <a href="">
                    <span class="text-green-500">
                        *
                    </span>
                    nal</a>
                <a href="">
                    <span class="text-green-500">
                        *
                    </span>
                    中文</a>
                <a href="">
                    <span class="text-green-500">
                        *
                    </span>
                    日本</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/prism.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/line-numbers/prism-line-numbers.min.js" integrity="sha256-K837BwIyiXo5k/9fCYgqUyA14bN4/Ve9P2SIT0KmZD0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            preAddCode()
        })
        const preAddCode = () => {
            let doc_pre = $(".article_content pre");
            doc_pre.each(function () {
                if(this.firstChild.localName != 'code') {
                    let class_cal = $(this).attr('class');
                    let class_arr = new Array();
                    class_arr = class_cal.split(" ")
                    class_arr = class_arr[1].split("-")
                    let lan_class = "language-" + class_arr[1]
                    let pre_content = "<code class='" + lan_class + "' lang='" + class_arr[1] + "'>" + $(this).html() + "</code>"
                    $(this).html(pre_content)
                    $(this).attr("class",'line-numbers '+ lan_class);
                }
            })
        }
    </script>
@endsection
