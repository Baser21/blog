<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name'];

    //una categoria puede tener muchos articulos (por eso el nombre de la funcion articles en plural)
    //1 categoria -> varios articulos | 1 articulo -> 1 categoria
    public function articles(){
        return $this->hasMany('\App\Article');
    }
}
