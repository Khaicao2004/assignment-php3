<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'is_active'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_photo', 'photo_id', 'post_id');
    }
}
