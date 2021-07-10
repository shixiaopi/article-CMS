@extends('web.layout')
@section('content')
    @if($article->isEmpty())
        <div class="card">
            <div>暂无数据</div>
        </div>
    @else
    @foreach($article as $item)
    <div class="card">
        <h4 class="leading-9 text-xl text-gray-700 truncate"><a href="{{ $website->url }}/article/{{ $item->id }}.html" target="_blank" title="{{ $item->title }}" rel="{{ $item->title }}">{{ $item->title }}</a></h4>
        <div class="flex text-gray-500 text-sm">
            <div class="p-2 flex">
						<span class="mr-1">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
							</svg>
						</span>
                {{ $item->cate->name }}
            </div>
            <div class="p-2 flex">
						<span class="mr-1">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	  							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
						</span>
                {{ $item->created_at }}
            </div>
            <div class="p-2 flex">
						<span class="mr-1">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</span>
                {{ $item->show }}
            </div>
        </div>
        <div class="md:flex mt-1">
            <div class="md:w-3/5 mb-2 md:mb-0">
                <a href=""><img src="https://t7.baidu.com/it/u=2529476510,3041785782&fm=193&f=GIF" class="rounded-md w-full max-h-24" alt=""></a>
            </div>
            <div class="md:ml-5 text-gray-500">
                <a href="{{ $website->url }}/article/{{ $item->id }}.html" target="_blank" title="{{ $item->title }}" rel="{{ $item->title }}">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 350) }}</a>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @if(!$article->isEmpty())
    <div class="card">
        {{ $article->links('vendor.pagination.simple-tailwind') }}
    </div>
    @endif
@endsection
