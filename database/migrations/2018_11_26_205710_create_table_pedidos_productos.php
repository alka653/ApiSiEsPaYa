<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedidosProductos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos_productos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('pedido_id')->unsigned();
			$table->foreign('pedido_id')->references('id')->on('pedidos');
			$table->integer('producto_id')->unsigned();
			$table->foreign('producto_id')->references('id')->on('productos');
			$table->integer('cantidad');
			$table->decimal('precio', 11, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pedidos_productos');
	}
}
