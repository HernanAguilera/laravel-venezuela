<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenezuelaTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estados', function($table)
	    {
	        $table->increments('id');
	        $table->string('estado');
	        $table->string('iso_3166-2');
	    });

	    Schema::create('municipios', function($table)
	    {
	        $table->increments('id');
	        $table->integer('estado_id')->unsigned();
	        $table->string('municipio');
	        $table->foreign('estado_id')->references('id')->on('estados');
	    });

	    Schema::create('ciudades', function($table)
	    {
	        $table->increments('id');
	        $table->integer('estado_id')->unsigned();
	        $table->string('ciudad');
	        $table->tinyInteger('capital');
	        $table->foreign('estado_id')->references('id')->on('estados');
	    });

	    Schema::create('parroquias', function($table)
	    {
	        $table->increments('id');
	        $table->integer('municipio_id')->unsigned();
	        $table->string('parroquia');
	        $table->foreign('municipio_id')->references('id')->on('municipios');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estados');
		Schema::drop('municipios');
		Schema::drop('ciudades');
		Schema::drop('parroquias');
	}

}
