<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTablePersonas extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('personas', function (Blueprint $table) {
			$table->dropForeign('personas_municipio_id_foreign');
			$table->integer('municipio_id')->unsigned()->nullable()->change();
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
		Schema::table('personas', function (Blueprint $table) {
			
		});
	}
}
