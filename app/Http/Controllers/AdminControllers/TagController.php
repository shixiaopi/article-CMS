<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Transformers\TagTransform;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view(self::THEME_PREFIX . '.tag.index');
    }

    public function getList(Request $request): \Illuminate\Http\JsonResponse
    {
        $parser = ['id','name'];
        return $this->listFormat(new Tag(), $request, $parser, new TagTransform());
    }

    public function create()
    {
        return view(self::THEME_PREFIX . '.tag.create');
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|min:1|max:15|unique:tags'
        ]);
        Tag::create($request->only(['name']));
        return $this->msg();
    }

    public function show(Tag $tag)
    {
        return view(self::THEME_PREFIX . '.tag.show', compact('tag'));
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|min:1|max:15|unique:tags,name,' . $request->id
        ]);
        $tag = Tag::find($request->get('id'));
        if(empty($tag)) abort(404, '标签不存在');

        $tag->update($request->only(['name']));
        return $this->msg();
    }

    public function destroy(Tag $tag): \Illuminate\Http\JsonResponse
    {
        $tag->delete();
        return $this->msg();
    }

}
