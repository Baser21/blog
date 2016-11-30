<?php

namespace App\Http\Controllers;
use App\Image as Image;
use Facebook\FacebookSession as FacebookSession;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $images = Image::all();

        return view('admin.images.index')->with('images', $images);
    }

    public function face(){

    }
}
