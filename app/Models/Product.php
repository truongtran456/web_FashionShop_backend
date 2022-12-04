<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
//điều chỉnh các cột cần sử dụng fillable
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'thumb'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
    public function user()
    {
        return $this->belongsTo(UserHome::class, 'user_id', 'id');
    }

}
