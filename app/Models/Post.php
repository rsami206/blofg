<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','Excerpt', 'content', 'photo_path', 'user_id', 'category_id'];

    // one to one relation

    public function user(){
        return $this->belongsTo(user::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
