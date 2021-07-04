<?php


namespace App\Http\Transformers;


class ArticleTransform extends BaseTransform
{
    public function transform($item)
    {
        // TODO: Implement transform() method.
    }

    public function transformObject($items)
    {
        return $items->map(function ($item){
            return [
                'title' => $item->title,
                'id' => $item->id,
                'cate' => $item->cate->name,
                'user' => $item->user->name,
                'tags' => $item->tagFormat(),
                'show' => $item->show,
                'status' => $item->status,
                'created_at' => $item->created_at->format('Y-m-d H:m:s')
            ];
        })->all();
    }
}
