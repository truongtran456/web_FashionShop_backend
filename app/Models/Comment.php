<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment_body',
        'user_id',
        'post_id'
    ];

    public function user()
    {
        return $this->hasOne(UserHome::class, 'id', 'user_id')
            ->withDefault(['user_id' => '']);
    }

    public function post()
    {
        return $this->belongsTo(Product::class);
    }
}
