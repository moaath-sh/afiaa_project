<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'TeSmCom',
        'post_id',
        'user_id',
    ];

    public function socialmedia()
    {
        return $this->belongsTo(SocialMedia::class, 'SocialMedia_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
