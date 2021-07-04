<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Tools\ConstName;
use App\Models\Article;
use App\Models\Cate;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        return view(self::THEME_PREFIX . '.home.index');
    }

    public function welcome()
    {
        $info = $this->infoCount();
        return view(self::THEME_PREFIX . '.home.welcome',compact('info'));
    }

    protected function infoCount()
    {
        $key = ConstName::ADMIN_INFO_COUNT;
        if(Cache::has($key)){
            return Cache::get($key);
        }

        $data = [
            'article' => Article::count(),
            'cate' => Cate::count()
        ];
        Cache::put($key, $data, now()->addHours(24));
        return $data;
    }

}
