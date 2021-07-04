<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Tools\ConstName;
use App\Http\Transformers\CateTransform;
use App\Models\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CateController extends Controller
{
    public function index()
    {
        return view(self::THEME_PREFIX . '.cate.index');
    }

    public function getList(Request $request)
    {
        $parser = ['name','code','order','parentId','id'];
        $order = ['order','asc'];
        return $this->listFormat(new Cate(), $request, $parser, new CateTransform(), $order);
    }

    public function create($parentId)
    {
        if($parentId){
            $cate = Cate::find($parentId);
            if(empty($cate)){
                $parentId = 0;
            }else{
                $parentId = $cate->id;
            }
        }
        return view(self::THEME_PREFIX . '.cate.create',compact('parentId'));
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|min:2|max:16|unique:cates'
        ]);
        Cate::create($request->only(['name','code','order','parentId']));
        $this->setCache();
        return $this->msg();
    }

    public function show(Cate $cate)
    {
        return view(self::THEME_PREFIX . '.cate.show',compact('cate'));
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|min:2|max:16|unique:cates,name,' . $request->id,
            'parentId' => 'required'
        ]);
        $model = new Cate();
        $cate = $model::find($request->get('id'));
        if(empty($cate)){
            abort(404, '分类不存在');
        }
        $data = $request->only(['name','code','order','parentId']);

        if( !empty( $data['parentId'] ) && empty( $model::find( $data['parentId'] ) ) ){
            abort(404,'父级不存在');
        }

        $cate->update($data);
        $this->setCache();
        return $this->msg();

    }

    public function destroy(Cate $cate): \Illuminate\Http\JsonResponse
    {
        $cate->delete();
        $this->setCache();
        return $this->msg();
    }

    private function setCache()
    {
        $cate = Cate::orderBy('order','asc')->get(['id','name','code','order','parentId']);
        Cache::forever(ConstName::CATE_CACHE_NAME, $cate);
    }

}
