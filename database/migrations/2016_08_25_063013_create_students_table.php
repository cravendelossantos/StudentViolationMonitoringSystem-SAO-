<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_no')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('course');
            $table->enum('year_level' , array('1st' , '2nd', '3rd', '4th' , '5th'));
            $table->string('contact_no');
            $table->date('date_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
