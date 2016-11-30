<?php

namespace App\Http\Controllers;

use App\Article as Article;
use App\Image as Image;
use Illuminate\Http\Request;
use App\Category as Category;
use App\Tag as Tag;
use App\Http\Requests\ArticleRequest as ArticleRequest;

class ArticlesController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->name)->orderBy('id', 'ASC')->paginate(5);

        return view('admin.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //se hace con list para cargarlo en el select a posteriori
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.articles.create')
                ->with('categories', $categories)
                ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;

        $article->save();

        //Guardamos los tags sync-> rellena la tabla pivote, con el array de tags que viene de la vista
        $article->tags()->sync($request->tags);

        //Si tenemos una imagen la guardamos en recursos del proyecto
        if($request->file('image')){
            $file = $request->file('image');
            //nombre en el que se guardara la imagen
            $name = 'blogappear_' . time() . '.' . $file->getClientOriginalExtension();

            //ruta donde queremos guardar la imagen
            $path = public_path() . '\\images\\articles\\';

            //movemos la imagen a esa ruta con ese nombre
            $file->move($path, $name);

            $image = new Image();
            $image->name = $name;
            //una opcion seria esta $image->article_id = $article->id;
            //otra mas fiable ( por el belongsTo)
            $image->article()->associate($article);
            $image->save();
        }

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

        $my_tags = $article->tags->pluck('id')->ToArray();


        return view('admin.articles.edit')
                    ->with('article', $article)
                    ->with('categories', $categories)
                    ->with('tags', $tags)
                    ->with('my_tags', $my_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);

        $article->fill($request->all());

        $article->save();

        //Guardamos los tags sync-> rellena la tabla pivote, con el array de tags que viene de la vista
        $article->tags()->sync($request->tags);

        flash('Articulo de ' . $article->user->name . ' modificado correctamente', 'success');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        flash('El articulo ' . $article->title . ' de ' . $article->user->name . ' se ha eliminado correctamente', 'danger');
        return redirect()->route('articles.index');
    }
}