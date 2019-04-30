<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
         'nombre' => 'Juan Cruz',
         'apellido' => 'Fernandez',
         'dni' => '38236940',
         'email' => 'juancruzf017@gmail.com',
         'password' => bcrypt('juan123'),
        ]);
        
        factory(User::class,30)->create([ 
          'password' => bcrypt('juan123'),
        ]);
    }
}
