<?php

//Cuidado!!! por defecto me pone este i no sirve: namespace App\Https\ViewComposer;
namespace App\Http\ViewComposers;

use App\Tag;
use Illuminate\Contracts\View\View;
use App\Category;

class AsideComposer
{
    public function compose(View $view){
        $categories = Category::orderBy('name', 'ASC')->get();
        $tags = Tag::orderBy('name', 'ASC')->get();
        $view->with('categories', $categories )->with('tags', $tags);
    }
}