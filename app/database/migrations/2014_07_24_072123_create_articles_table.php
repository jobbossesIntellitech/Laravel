<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function($table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('body')->nullable();
            $table->string('image')->nullable();
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
		Schema::drop('articles');
		/*Schema::table('articles', function(Blueprint $table)
		{
			
		});*/
	}

}
