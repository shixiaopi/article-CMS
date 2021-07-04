<?php


namespace App\Http\Transformers;


abstract class BaseTransform
{
    public function transformCollection($items): array
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);

    public abstract function transformObject($items);
}
