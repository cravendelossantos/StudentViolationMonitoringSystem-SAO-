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
            $table->integer('violation_id');
            $table->integer('offense_no');
            $table->string('sanction');   
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
