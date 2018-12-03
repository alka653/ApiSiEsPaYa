<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePuestosMultimedias extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('puestos_multimedias', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('recurso');
			$table->string('tipo', 2);
			$table->integer('puesto_id')->unsigned();
			$table->foreign('puesto_id')->references('id')->on('puestos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('puestos_multimedias');
	}
}
