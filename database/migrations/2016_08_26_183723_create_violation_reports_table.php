<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('violation_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->integer('violation_id')->unsigned();
            $table->foreign('violation_id')->references('id')->on('violations');
            $table->integer('offense_no');
            $table->string('sanction');
            $table->string('offense_level');
            //$table->boolean('community_service');   
            $table->enum('status', array ('Pending', 'Completed'));
            $table->string('complainant');
            $table->date('date_reported');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('violation_reports');
    }
}
