<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Tools\ConstName;
use App\Http\Transformers\ArticleTransform;
use App\Models\Article;
use App\Models\Cate;
use App\Models\Tag;
use App\Models\TagArticle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index()
    {
        $cate = Cate::orderBy('order','asc')->get(['id','name']);
        return view(self::THEME_PREFIX . '.article.index',compact('cate'));
    }

    public function getList(Request $request)
    {
        $parser = ['title','cate_id','user_id','status','content','show','created_at','id'];
        return $this->listFormat(new Article(), $request, $parser, new ArticleTransform());
    }

    public function create()
    {
        $cate = Cache::get(ConstName::CATE_CACHE_NAME, function () {
            return Cate::orderBy('order','asc')->get();
        });
        return view(self::THEME_PREFIX . '.article.create',compact('cate'));
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required|min:2|max:150|unique:articles',
            'cate_id' => 'required',
            'content' => 'required'
        ]);
        $data = $request->only(['title','cate_id','content','user','tag','status']);
        $this->storeFormat($data);
        return $this->msg();
    }

    public function show(Article $article)
    {
        $cate = Cate::orderBy('order','asc')->get();
        return view(self::THEME_PREFIX . '.article.show',compact(['article','cate']));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required|min:2|max:150|unique:articles,title,'. $request->id,
            'cate_id' => 'required',
            'content' => 'required'
        ]);
        $article = Article::find($request->get('id'));
        if(empty($article)) abort(404,'网站不存在');

        $data = $request->only(['title','cate_id','content','user','tag','status']);

        //验证标签
        $article->update([
            'title' => $data['title'],
            'cate_id' => $data['cate_id'],
            'content' => $data['content'],
            'user_id' => $this->verifyUser($article, $data['user']),
            'status' => isset($data['status']) ? 1 : 0
        ]);
        $this->verifyTag($article,$data['tag']);
        return $this->msg();
    }

    public function destroy(Article $article)
    {
        TagArticle::where('article_id',$article->id)->delete();
        if ( empty( Article::where('id','!=',$article->id)->where('user_id',$article->user_id)->first() ) ){
            User::where('id',$article->user_id)->delete();
        }
        $article->delete();
        return $this->msg();
    }

    /**
     * 更新标签
     * @param $article
     * @param $tag
     * @return bool
     */
    protected function verifyTag($article, $tag): bool
    {
        TagArticle::where('article_id',$article->id)->delete();
        return $this->updateTags($article->id, $tag);
    }

    /**
     * 验证作者，如果不存在则创建，如果旧用户没有存在其他文章，则删除用户信息
     * @param Article $article
     * @param string $user_name
     * @return mixed
     */
    protected function verifyUser(Article $article, string $user_name)
    {
        if($article->user->name == $user_name) return $article->user->id;

        $userModel = new User();

        $user = $userModel->where('name',$user_name)->first();
        if($user) return $user->id;

        $user = $userModel->create(['name'=> $user_name]);
        if( !Article::where('id','!=',$article->id)->where('user_id',$article->user_id)->first() ){
            $userModel->where('id',$article->user_id)->delete();
        }
        return $user->id;
    }

    /**
     * 创建数据
     * @param $data ['title','cate_id','content','user','tag','status']
     * @param bool $reptile 是否为爬虫
     * @return bool
     */
    protected function storeFormat($data, bool $reptile = false): bool
    {
        $cate = $this->verifyCate($data['cate_id'], $reptile);

        if($data['user']){
            $userModel = new User();
            $user = $userModel::where('name',$data['user'])->first();
            if(empty($user)) {
                $user = $userModel::create(['name'=>$data['user']]);
            }
            $data['user'] = $user->id;
        }

        $new_data = [
            'title' => $data['title'],
            'cate_id' => $cate->id,
            'user_id' => $data['user'],
            'status' => isset($data['status']) ? 1 : 0,
            'content' => $data['content'],
            'created_at' => now()->format('Y-m-d H:i:s')
        ];
        if(isset($data['created_at'])){
            $new_data['created_at'] = $data['created_at'];
        }

        $result = Article::create($new_data);

        if($data['tag']) {
            $this->updateTags($result->id, $data['tag']);
        }

        return true;
    }

    /**
     * 验证分类，如果分类不存在同时是爬虫状态就创建分类，否则抛出错误
     * @param string|integer $name 分类名称或id
     * @param bool $reptile 是否爬虫 true是
     * @return mixed
     */
    protected function verifyCate($name, $reptile)
    {
        $cate =  Cache::get(ConstName::CATE_CACHE_NAME,function(){
            Cate::orderBy('order','asc')->get();
        });
        if(is_numeric($name)){
            $result = $cate->firstWhere('id',$name);
        }else{
            $result = $cate->firstWhere('name',$name);
        }

        if(empty($result) && $reptile == false){
            abort(404,'分类不存在');
        }
        if(empty($result) && is_string($name)){
            return Cate::create(['name'=>$name]);
        }
        return $result;
    }

    /**
     * 写入标签
     * @param $article_id
     * @param $tags
     * @return bool
     */
    protected function updateTags($article_id,$tags): bool
    {
        $tag_article = [];
        foreach ($this->storeTag($tags) as $item) {
            array_push($tag_article, [
                'article_id' => $article_id,
                'tag_id' => $item
            ]);
        }
        TagArticle::insert($tag_article);
        return true;
    }

    /**
     * 查询创建标签
     * @param $tag
     * @return array
     */
    protected function storeTag($tag): array
    {
        $arr = explode(',', strtolower($tag));
        $model = new Tag();
        $result = $model->whereIn('name', $arr)->get(['id','name'])->toArray();
        $diff_name = array_diff($arr, array_column($result, 'name'));
        $result_id = array_column($result, 'id');
        if(empty($diff_name)){
            return $result_id;
        }
        $diff_result_name = [];
        foreach ($diff_name as $item){
            array_push($diff_result_name, ['name' => $item]);
        }
        $model::insert($diff_result_name);
        $result = $model->whereIn('name',$diff_name)->get('id')->toArray();

        return array_merge($result_id, array_column($result, 'id'));
    }

}
