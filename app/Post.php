<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters){
        // if($filters['search'] ?? false){
        //     $query
        //         ->where('title', 'like', '%' .request('search'). '%')
        //         ->orWhere('body', 'like', '%' .request('search'). '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('title', 'like', '%' .$search. '%')
                ->orWhere('body', 'like', '%' .$search. '%');
        });
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
