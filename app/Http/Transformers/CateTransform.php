<?php


namespace App\Http\Transformers;


class CateTransform extends BaseTransform
{
    public function transform($item)
    {
        // TODO: Implement transform() method.
    }

    public function transformObject($items)
    {

        return $items->map(function($item) {
            return [
                'authorityId' => $item->id,
                'name' => $item->name,
                'code' => $item->code,
                'order' => $item->order,
                'parentId' => $item->parentId == 0 ? - 1 : $item->parentId,
                'isMenu' => 0
            ];
        })->all();

    }
}
