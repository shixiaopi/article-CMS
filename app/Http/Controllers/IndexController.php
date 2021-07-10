<?php
namespace App\Http\Controllers;

use App\Http\Tools\ConstName;
use App\Models\Article;
use App\Models\Cate;
use App\Models\System;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        list($cate, $website, $week_host) = $this->publicData();
        $article = Article::orderBy('created_at','desc')->paginate(10);
        return view(self::WEB_THEME . '.index', compact(['article', 'cate', 'website', 'week_host']));
    }

    public function getList($cate)
    {
        $cate_model = Cate::where('code',$cate)->first();
        if (empty($cate)) abort(404, '分类不存在');

        list($cate, $website, $week_host) = $this->publicData();
        $article = $cate_model->article()->paginate(10);
        return view(self::WEB_THEME . '.index', compact(['article', 'cate', 'website', 'week_host']));
    }

    /**
     * @return array
     */
    protected function publicData()
    {
        $cate = Cache::get(ConstName::CATE_CACHE_NAME, function (){
            $cate = Cate::orderBy('order','asc')->get();
            Cache::forever(ConstName::CATE_CACHE_NAME, $cate);
            return $cate;
        });
        $website = Cache::get(ConstName::SYSTEM_CACHE_NAME, function (){
            $system = System::first();
            Cache::forever(ConstName::SYSTEM_CACHE_NAME, $system);
            return $system;
        });

        $week_host = Cache::get(ConstName::WEEK_HOST_ARTICLE, function (){
            $article = Article::where('created_at', '<', now()->addWeeks(-1)->toDateString())->orderBy('show', 'desc')->limit(10)->get(['id','title']);
            Cache::put(ConstName::WEEK_HOST_ARTICLE, $article, now()->addWeeks(1));
            return $article;
        });
        return [$cate, $website, $week_host];
    }

    public function show(Article $article)
    {
        list($cate, $website, $week_host) = $this->publicData();
        return view(self::WEB_THEME . '.show',compact(['article', 'cate', 'website', 'week_host']));
    }

    public function demo()
    {
        return view(self::WEB_THEME . '.demo');
    }
}
