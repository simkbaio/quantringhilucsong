<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('parent')->default(0);
			$table->integer('menuspack_id')->default(0);
			$table->integer('order')->default(0);
			$table->string('link')->default('#');
			$table->boolean('sercury')->default(false);
			$table->string('icon')->nullable();
			$table->string('description')->nullable();
			$table->text('permission')->nullable();
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
		Schema::drop('menus');
	}

}
