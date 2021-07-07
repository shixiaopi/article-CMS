<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cate_id',
        'user_id',
        'status',
        'content',
        'show',
        'created_at'
    ];

    public $timestamps = false;

    public function cate(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Cate::class,'id','cate_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class,'tag_article','article_id','tag_id');
    }

    public function tagFormat()
    {
        $tags = [];
        foreach ($this->tag as $item){
            $tags[] = $item->name;
        }
        return $tags;
    }

}
