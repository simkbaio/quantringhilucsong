<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuMenuspackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_menuspack', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('menu_id')->unsigned()->index();
			$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
			$table->integer('menuspack_id')->unsigned()->index();
			$table->foreign('menuspack_id')->references('id')->on('menuspacks')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_menuspack');
	}

}
