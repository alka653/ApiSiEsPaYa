<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedidos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function (Blueprint $table) {
			$table->increments('id');
			$table->dateTime('fecha_pedido');
			$table->decimal('precio_total', 11, 2);
			$table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('users');
			$table->integer('domiciliario_id')->unsigned();
			$table->foreign('domiciliario_id')->references('id')->on('users');
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
		Schema::dropIfExists('pedidos');
	}
}
