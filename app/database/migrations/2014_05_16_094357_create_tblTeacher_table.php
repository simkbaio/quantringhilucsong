<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblTeacherTable extends Migration {

	public function up()
	{
		Schema::connection('hosohocvien')->create('tbl_teacher', function(Blueprint $table) {
			$table->increments('teacher_id');
            $table->string('teacher_name',100);
            $table->integer('teacher_type')->default(0)->nullable();
            $table->integer('teacher_join_date')->unsigned()->nullable();
            $table->integer('teacher_out_date')->unsigned()->nullable();
            $table->integer('teacher_phone')->unsigned()->nullable();
            $table->string('teacher_address',250)->nullable();
            $table->string('teacher_email',250)->nullable();
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
		Schema::connection('hosohocvien')->drop('tbl_teacher');
	}

}
