<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgegroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agegroups', function($table)
		{
			$table->increments('id');
                        $table->string('title');
                        $table->string('slug');
                        $table->integer('start_age');
                        $table->integer('end_age');
                        $table->integer('user_id');
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
		Schema::drop('agegroups');
		
	}

}
