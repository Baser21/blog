<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];

    //Relacion muchos a muchos
    public function articles(){
    	return $this->belongsToMany('\App\Article')->withTimestamps();
    }

    //Buscador
    public function scopeSearch($query, $name){
    	return $query->where('name', 'like', "%$name%");
    }

    //scope para buscar
    public function scopeSearchTag($query, $name){
        return $query->where('name','=', $name);
    }
}
