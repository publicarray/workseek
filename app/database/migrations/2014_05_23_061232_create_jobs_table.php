<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function($table)
        {
            $table->increments('id');
            $table->string('title')->index();
            $table->float('salary')->index();
            $table->string('city')->index();
            $table->text('description')->index();
            $table->date('start_date')->index();
            $table->date('end_date')->index();
            $table->integer('employer_id')->index();
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
		Schema::drop('jobs');
	}

}
