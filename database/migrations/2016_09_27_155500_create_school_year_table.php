<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('school_years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('first_sem_id')->unsigned();
            $table->foreign('first_sem_id')->references('id')->on('first_semester');
            $table->integer('second_sem_id')->unsigned();
            $table->foreign('second_sem_id')->references('id')->on('second_semester');
            

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('school_years');
    }
}
