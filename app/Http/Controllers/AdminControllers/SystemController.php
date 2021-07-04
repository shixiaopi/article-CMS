<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Tools\ConstName;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SystemController extends Controller
{
    public function index()
    {
        $system = System::first();
        return view(self::THEME_PREFIX . '.system.index',compact('system'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $model = new System();
        $system = $model::first();
        $data = $request->only(['name','keywords','description','url','logo','tongji']);
        if(empty($system)){
            $model->create($data);
            $this->setCache();
            return $this->msg();
        }

        $system->update($data);
        $this->setCache();
        return $this->msg();
    }

    private function setCache()
    {
        $system = System::first();
        Cache::forever(ConstName::SYSTEM_CACHE_NAME, $system);
    }

}
