<?php


namespace App\Http\Controllers;


use App\Http\Controllers\AdminControllers\ArticleController;
use App\Http\Tools\ConstName;
use App\Models\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReptileController extends ArticleController
{
    /**
     * 采集接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function boot(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required|min:2|max:120'
        ]);
        $data = $request->only(['title','cate_id','user','status','content','tag','created_at']);

        $this->storeFormat($data, true);
        return $this->msg();
    }

    public function demo()
    {
        $d = now()->addWeeks(-1)->toDateString();
        dd($d);
    }
}
