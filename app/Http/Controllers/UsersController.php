<?php

//comando para crear el controlador
//php artisan make:controller -r  UsersController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Laracasts\Flash\FlashServiceProvider;
use App\Http\Requests\UserRequest as UserRequest;

class UsersController extends Controller
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
    //ruta http://localhost/blog/public/admin/users/
    //Sirve para listar los usuarios
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);

        return view('admin.users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * Se llama cuando crear un nuevo usuario
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        
        //Ciframos la contraseña
        $user->password = bcrypt($request->password);
        
        $user->save();

        //Una vez guardado el usuario retornamos a la lista de usuarios
        flash( $user->name . ' se ha registrado correctamente.', 'success'); //Incluye este mensaje en la siguiente url
        return redirect()->route('users.index');
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
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        //Reemplaza automaticamente
        $user->fill($request->all());

        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->type = $request->type;

        $user->save();

        flash('Usuario guardado correctamente' , 'success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        flash('El usuario ' . $user->name . " se ha eliminado.", 'danger');
        return redirect()->route('users.index');
    }
}
