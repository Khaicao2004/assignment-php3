<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'author_id',
        'name',
        'slug',
        'sku',
        'img_thumbnail',
        'overview',
        'content',
        'is_view',
        'is_hot',
        'is_active'
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function photos()
    {
        return $this->belongsToMany(Photo::class,'post_photo','post_id','photo_id');
    }
}
