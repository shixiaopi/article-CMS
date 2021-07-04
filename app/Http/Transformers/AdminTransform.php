<?php


namespace App\Http\Transformers;


class AdminTransform extends BaseTransform
{
    public function transform($item)
    {
        // TODO: Implement transform() method.
    }

    public function transformObject($items)
    {
        return $items->map(function ($item) {
            return [
                'id' => $item->id,
                'username' => $item->username,
                'updated_at' => $item->updated_at->format('Y-m-d')
            ];
        })->all();
    }
}
