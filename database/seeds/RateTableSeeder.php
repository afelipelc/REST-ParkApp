<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RateTableSeeder extends Seeder {
  public function run()
  {
    $rates = array(['nombre' => 'Hora', 'duracion' => 1.0, 'costo' => 10.0, 'created_at' => new DateTime, 'updated_at' => new DateTime
    ]);

    DB::table('rates')->insert($rates);

  }
}