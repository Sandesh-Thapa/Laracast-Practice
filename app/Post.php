<?php

namespace App;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all () {
        // $files =  File::files(resource_path("posts/"));
        // $contents = [];

        // for($i=0; $i<count($files); $i++){
        //     $contents[$i] = $files[$i]->getContents();
        // }
        // return $contents;
        
        return collect(File::files(resource_path("posts")))
            ->map(function($file){
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document){
                //$document = YamlFrontMatter::parseFile($file);
                
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            })->sortByDesc('date');
    }

    public static function find($slug){
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))){
        //     throw new ModelNotFoundException();
        // }

        // // return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));

        // return cache()->remember("posts.{$slug}", 1200, function () use ($path){      // now()->addMinutes()
        //             return file_get_contents($path);
        // });

        // of all the blog posts, find the one with a slug that matches the one that was ssuggested
        
        return static::all()->firstWhere('slug', $slug);

    }
}