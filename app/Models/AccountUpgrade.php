<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountUpgrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'image',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
