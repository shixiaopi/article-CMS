<?php
namespace App\Http\Controllers;

use App\Models\Article;

class IndexController extends Controller
{
    public function index()
    {
        $article = Article::orderBy('id','desc')->paginate(1);
        return view(self::WEB_THEME . '.index', compact(['article']));
    }

    public function show()
    {
        return view(self::WEB_THEME . '.show');
    }

    public function demo()
    {
        return view(self::WEB_THEME . '.demo');
    }
}
