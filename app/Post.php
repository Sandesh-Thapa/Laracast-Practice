<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //use HasFactory;
    protected $guarded = [];

    protected $with = ['category', 'author'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
