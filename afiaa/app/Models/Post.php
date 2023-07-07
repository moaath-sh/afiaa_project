<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'TeSm',
        'AttSm',
        'user_id',

    ];
    public function Comment()
    {
        return $this->hasMany(Comment::class ,'SocialMedia_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
