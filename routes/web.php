<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
	GET->Mostrar
	POST->Almacenar datos de formulario
	PUT->Editar
	DELETE->Eliminar
	RESOURCE
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'front.index'
]);

Route::get('/categories/{name}',[
    'uses' => 'FrontController@searchCategory',
    'as' => 'front.search.category'
]);

Route::get('/tags/{name}',[
    'uses' => 'FrontController@searchTag',
    'as' => 'front.search.tag'
]);

Route::group(['prefix' => 'admin'], function(){

    Route::get('/', [
       'as' => 'admin.index', function(){
            return view('admin.index');
        }
    ]);

	//Crea un estilo de api result que toma los metodos de un controlador y definislos como estilos de rutas
	//param: nombre para este grupo de rutas, nombre del controlador que va a definir las rutas 
	Route::resource('users', 'UsersController');
	//ruta para eliminar. Se hace asi aunque el resource tiene una ruta para eliminar, pasa que se queda como 1 formulario y 1 boton
	Route::get('users/{id}/destroy', [
				'uses' => 'UsersController@destroy',
				'as'  =>  'users.destroy']);

	//Rutas completas para categorias
	Route::resource('categories' , 'CategoriesController');
	Route::get('categories/{id}/destroy', [
				'uses' => 'CategoriesController@destroy',
				'as'   => 'categories.destroy']);

	//Rutas completas para tags
	Route::resource('tags' , 'TagsController');
	Route::get('tags/{id}/destroy', [
				'uses' => 'TagsController@destroy',
				'as'   => 'tags.destroy']);

	//Rutas completas para los articulos
	Route::resource('articles' , 'ArticlesController');
	Route::get('articles/{id}/destroy', [
				'uses' => 'ArticlesController@destroy',
				'as'   => 'articles.destroy']);

    //Ruta index para mostrar las imagenes
    Route::get('images', [
       'uses' => 'ImagesController@index',
        'as' => 'images.index'
    ]);

    //prueba con facegbook
    Route::get('face', [
       'uses' => 'ImagesController@face',
        'as' => 'images.face'
    ]);

});

//Se usa un comando: php artisan make:auth
Auth::routes();

Route::get('/home', 'HomeController@index');



//RUTAS DE PRUEBA---> NO LAS USO
//Pasando un valor en la url
/*Route::get('articles0/{nombre?}', function($nombre = "No coloco nombre"){
	echo "El nombre que has colocado es " . $nombre;
});

//Llamando a un controlador
Route::get('articles1',[
	'as'   => 'articles',
	'uses' => 'UserController@index'
	]);

//Grupo de rutas
Route::group(['prefix' => 'articles'], function(){
	Route::get('view/{id}' , [
		'uses' => 'TestController@view',
		'as'   => 'articlesView'
		]);
});
*/