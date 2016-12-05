<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    //region Sluggable
    //El slug se usa para poner en el titulo de la url el nombre del titulo del articulo que se esta mostrando
    //Crea una columna en la bd y cada vez que se inserta un articulo lo autorellena con el slug que se mostrara en la url
    use Sluggable;

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    //endregion

    protected $table = "articles";

    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    //1 articulo -> 1 categoria | 1 categoria -> varios articulos
    public function category(){
    	return $this->belongsTo('\App\Category');
    }

    //1 articulo -> 1 usuario | 1 usuario -> varios articulos
    public function user(){
        return $this->belongsTo('\App\User');
    }

    //1 articulo -> varias imagenes | 1 imagen -> 1 articulo
    public function images(){
    	return $this->belongsTo('\App\image');
    }

    //1 articulo -> varios tags | 1 tag -> varios articulos
    public function tags(){
    	return $this->belongsToMany('\App\Tag')->withTimestamps();
    }

    //Buscador
    public function scopeSearch($query, $name){
        return $query->where('title', 'like', "%$name%");
    }

}
