<?php

namespace App\Http\Controllers;

use App\Tag;
use Carbon\Carbon;
use App\Article as Article;
use App\Category as Category;
use App\Image as Image;


class FrontController extends Controller
{

    public function __FrontController(){
        Carbon::setLocale('es');
    }
    public function index(){
        $articles = Article::orderBy('id', 'ASC')->paginate(2);
        $images = Image::all();

        return view('front.index')->with('articles', $articles)->with('images', $images);
    }

    public function searchCategory($name){
        $category = Category::searchCategory($name)->first();
        $articles = $category->articles()->paginate(2);
        $images = Image::all();

        /*$articles->each(function($articles){
            $articles->category;
            $articles->images;
        });*/
        return view('front.index')->with('articles', $articles)->with('images', $images);
    }

    public function searchTag($name){
        $tag = Tag::searchTag($name)->first();
        $articles = $tag->articles()->paginate(2);
        $images = Image::all();

        return view('front.index')->with('articles', $articles)->with('images', $images);
    }
}
