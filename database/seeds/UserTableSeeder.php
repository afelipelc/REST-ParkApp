<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {
  public function run()
  {
    $users = array(['nombre' => 'Felipe LC', 'email' => 'afelipelc@gmail.com', 'username' => 'afelipe'
, 'password' => bcrypt('123'), 'rol' => 'admin', 
'created_at' => new DateTime, 'updated_at' => new DateTime
    ]);

    //DB::table('users')->insert($users);

    $rates = array(['nombre' => 'Hora', 'duracion' => 1.0, 'costo' => 10.0, 'created_at' => new DateTime, 'updated_at' => new DateTime
    ]);

    DB::table('rates')->insert($rates);
  }
}