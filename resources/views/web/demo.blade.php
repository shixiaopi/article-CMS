@extends('web.layout')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prism-themes@1.7.0/themes/prism-coldark-dark.css" integrity="sha256-KKJ2D9O+VHGHuPqcTEjsAROBPaQQU1E62PF6QXM0s3s=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/line-numbers/prism-line-numbers.css" integrity="sha256-ye8BkHf2lHXUtqZ18U0KI3xjJ1Yv7P8lvdKBt9xmVJM=" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css" integrity="sha256-h/qtq9bUnXbOOwP4EcbLtYM9Mk3iQQcHZAZ+Jz5y0WQ=" crossorigin="anonymous">--}}
@endsection
@section('content')
    <div class="w-cart-width">
        <div class="bg-gray-50 leading-10 pl-3 text-gray-500 text-sm border-b border-solid border-gray-300">
            你的位置：秋水逸冰 > 技术 > Windows 10 Pro for Workstations 21H1 DD 镜像
        </div>
        <div class="bg-white pt-2 pl-3 pb-3 border-b border-solid border-gray-200">
            <h3 class="text-xl text-gray-600">Windows 10 Pro for Workstations 21H1 DD 镜像</h3>
            <div class="flex text-gray-500 mt-2 text-sm">
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                    </svg>
                </span>
                    分类
                </div>
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                    作者
                </div>
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                    发布时间
                </div>
                <div class="flex mr-3">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
                    浏览次数
                </div>
            </div>
        </div>
        <article class="article_content bg-white pl-3 pr-3 pt-3 pb-5">
            <p><a href="//teddysun.com/610.html"><img class="aligncenter" style="width: 634px; height: 400px;" title="Caddy v1.0.5" src="//teddysun.com/wp-content/uploads/2021/caddy.svg" /></a></p>
            <p><span style="font-size: 14px;"><a href="https://caddyserver.com/" target="_blank" rel="noopener">Caddy Web Server</a> 自从在 2020 年 5 月发布 v2 大版本以后，就一刀切地取消了 v1 的开发，甚至不再提供二进制文件下载。</span><br />
                <span style="font-size: 14px;">v2 和 v1 的区别还是很大的，至少体现在配置文件 Caddyfile 上，就是 v2 更复杂了。</span><br />
                <span style="font-size: 14px;">其实很多人还是更喜欢用 v1 的，既然官方不提供下载，那就自己动手编译吧。</span><br />
                <span style="font-size: 14px;">于是就编译了 Caddy v1.0.5 + 插件 <a href="https://github.com/caddyserver/forwardproxy" target="_blank" rel="noopener">forwardproxy</a> + DNS 插件 <a href="https://github.com/caddyserver/dnsproviders" target="_blank" rel="noopener">cloudflare</a> + <a href="https://github.com/hacdias/caddy-v1-webdav" target="_blank" rel="noopener">WebDAV</a> 插件。</span><br />
                <span style="font-size: 14px;">使用 Go 1.16.3 编译，并将依赖项 <a href="https://github.com/lucas-clemente/quic-go" target="_blank" rel="noopener">quic-go</a> 升级到 v0.20.1 并修复了一处编译错误。</span></p>
            <p><span id="more-610"></span></p>
            <h3><span style="color: red;">Caddy v1.0.5 编译版</span></h3>
            <p><span style="font-size: 14px;"><strong>1. Linux 版下载链接</strong></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_linux_386" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_linux_386</a></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_linux_amd64" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_linux_amd64</a></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_linux_arm6" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_linux_arm6</a></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_linux_arm7" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_linux_arm7</a></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_linux_arm64" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_linux_arm64</a></span></p>
            <p><span style="font-size: 14px;">版本信息</span></p>
            <pre class="prettyprint lang-bsh">$ caddy -version
Caddy v1.0.5 (h1:5B1Hs0UF2x2tggr2X9jL2qOZtDXbIWQb9YLbmlxHSuM=)
</pre>
            <pre class="language-markup line-numbers"><code>&lt;!doctype html&gt;
&lt;html class=&quot;no-js&quot; lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta http-equiv=&quot;x-ua-compatible&quot; content=&quot;ie=edge&quot;&gt;
        &lt;title&gt;Demo&lt;/title&gt;
        &lt;meta name=&quot;description&quot; content=&quot;Demo&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

        &lt;link rel=&quot;apple-touch-icon&quot; href=&quot;apple-touch-icon.png&quot;&gt;
        &lt;!-- Place favicon.ico in the root directory --&gt;

        &lt;link rel=&quot;stylesheet&quot; href=&quot;/normalize.css"&gt;
        &lt;link rel=&quot;stylesheet&quot; href=&quot;/main.css"&gt;</code></pre>
            <p><span style="font-size: 14px;">插件信息</span></p>
            <pre class="prettyprint lang-bsh">$ caddy -plugins
Server types:
  http

Caddyfile loaders:
  short
  flag
  default

Other plugins:
  http.basicauth
  http.bind
  http.browse
  http.errors
  http.expvar
  http.ext
  http.fastcgi
  http.forwardproxy
  http.gzip
  http.header
  http.index
  http.internal
  http.limits
  http.log
  http.markdown
  http.mime
  http.pprof
  http.proxy
  http.push
  http.redir
  http.request_id
  http.rewrite
  http.root
  http.status
  http.templates
  http.timeouts
  http.webdav
  http.websocket
  on
  tls
  tls.cluster.file
  tls.dns.cloudflare
</pre>
            <p><span style="font-size: 14px;"><strong>2. Windows 版下载链接</strong></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_386.exe" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_386.exe</a></span><br />
                <span style="font-size: 14px;"><a href="https://dl.lamp.sh/files/caddy_amd64.exe" target="_blank" rel="noopener">https://dl.lamp.sh/files/caddy_amd64.exe</a></span></p>
            <p><span style="font-size: 14px;">Windows 版的 exe 文件使用 Resource Hacker 添加 icon 图标，以及版本信息。更美观一些。如下图：</span><br />
                <img class="left" style="width: auto; height: auto;" title="Caddy Windows" src="//teddysun.com/wp-content/uploads/2021/caddy_3.png" /></p>
            <p><span style="font-size: 14px;">详细信息：</span><br />
                <img class="left" style="width: auto; height: auto;" title="Caddy Windows Info" src="//teddysun.com/wp-content/uploads/2021/caddy_0.png" /></p>
            <p><span style="font-size: 14px;">进程：</span><br />
                <img class="left" style="width: auto; height: auto;" title="Caddy Windows Info" src="//teddysun.com/wp-content/uploads/2021/caddy_1.png" /></p>
            <p><img class="left" style="width: auto; height: auto;" title="Caddy Windows Info" src="//teddysun.com/wp-content/uploads/2021/caddy_2.png" /></p>
            <h3><span style="color: red;">Caddy v1.0.5 Docker Image</span></h3>
            <p><span style="font-size: 14px;">具体请参考以下链接：</span><br />
                <span style="font-size: 14px;"><a href="https://hub.docker.com/r/teddysun/caddy" target="_blank" rel="noopener">https://hub.docker.com/r/teddysun/caddy</a></span></p>
            <p>转载请注明：<a href="https://teddysun.com">秋水逸冰</a> &raquo; <a href="https://teddysun.com/610.html">Caddy v1.0.5 编译版</a></p>
            <div class="flex mt-5">
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
