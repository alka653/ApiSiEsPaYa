<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 50);
			$table->string('descripcion', 200);
			$table->decimal('precio', 11, 2);
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
		Schema::dropIfExists('productos');
	}
}
