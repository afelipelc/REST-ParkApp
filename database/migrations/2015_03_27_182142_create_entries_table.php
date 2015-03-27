<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->integer('rate_id')->unsigned();
            $table->datetime('entrada');
            $table->datetime('salida');
            $table->decimal('duracion');
            $table->decimal('importe');
            $table->timestamps();
            
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('rate_id')->references('id')->on('rates');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entries');
	}

}
