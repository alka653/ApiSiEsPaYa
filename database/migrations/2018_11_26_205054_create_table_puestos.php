<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePuestos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('puestos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre');
			$table->string('direccion');
			$table->string('ubicacion');
			$table->integer('propietario_id')->unsigned();
			$table->foreign('propietario_id')->references('id')->on('users');
			$table->string('descripcion', 200);
			$table->string('estado', 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('puestos');
	}
}
