<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'order',
        'parentId'
    ];

    public function article(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class, 'cate_id', 'id');
    }
}
