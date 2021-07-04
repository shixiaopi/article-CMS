<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Transformers\BaseTransform;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
    //后台主题目录名称
    const THEME_PREFIX = 'admin';

    /**
     * 数据列表格式化
     * @param Model $model
     * @param Request $request
     * @param array|null $parser
     * @param $transform BaseTransform
     * @param array $order
     * @return \Illuminate\Http\JsonResponse
     */
    protected function listFormat(Model $model, Request $request, ?array $parser, BaseTransform $transform, array $order = []): \Illuminate\Http\JsonResponse
    {
        $page = $request->get('page',0) - 1;
        $limit = $request->get('limit',15);
        if($order) {
            $model = $model->orderBy($order[0],$order[1]);
        }
        $this->listFormatSearchParams($request, $model);

        $total = $model->count();
        $data = $model->offset($page * $limit)->limit($limit)->get($parser);
        $data = $transform->transformObject($data);
        return response()->json([
            'msg' => 'Successfully',
            'code' => 0,
            'count' => $total,
            'data' => $data
        ],200);
    }

    /**
     * @param $request
     * @param $model
     * @return false
     */
    protected function listFormatSearchParams($request, &$model): bool
    {
        if(!$request->has('searchParams') || $request->get('searchParams') == '') return false;

        foreach (json_decode($request->get('searchParams')) as $key=>$value) {
            if($value){
                if($key == 'user'){
                    $user = User::where('name',$value)->first();
                    if( $user ){
                        $model = $model->where('user_id',$user->id);
                    }
                }else{
                    $model = $model->where($key,$value);
                }

            }
        }
        return true;
    }

    /**
     * 成功输出
     * @param string $message
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function msg(string $message = 'Successfully', array $data = [], int $code = 0): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'msg' => $message,
            'data' => $data,
            'code' => $code
        ],200);
    }

}
