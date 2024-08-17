<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'image',
        'is_active'
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
