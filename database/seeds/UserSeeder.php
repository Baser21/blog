<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//Esto se usa para crear ddatos en la base de datos de forma automatica
//para usarlos de prueba, etc
//comando utilizado: php artisan make:seeder UserSeeder
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear mediante el model factory
        factory(App\User::class, 10)->create();
        /* Crear uno
         * DB::table('users')->insert([
            'name' => 'Pedrito Perez',
            'email' => 'pedrito@mail.com',
            'password' => bcrypt('1234'),
            'type' => 'member'
        ]);*/
    }
}
