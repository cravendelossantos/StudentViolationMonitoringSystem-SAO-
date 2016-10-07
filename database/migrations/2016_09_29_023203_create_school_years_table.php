<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolYearsTable extends Migration
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
<<<<<<< HEAD
            $table->integer('school_year');
=======
            $table->string('school_year');
>>>>>>> refs/remotes/origin/master
            $table->string('term_name');
            $table->string('start');
            $table->string('end');



            
        

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
