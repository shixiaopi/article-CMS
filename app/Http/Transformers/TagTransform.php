<?php


namespace App\Http\Transformers;


class TagTransform extends BaseTransform
{
    public function transform($item)
    {
        // TODO: Implement transform() method.
    }

    public function transformObject($items)
    {
        return $items->toArray();
    }
}
