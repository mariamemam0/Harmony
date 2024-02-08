<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'habit_id', 
        'user_id', 
        'title', 
        'content'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
