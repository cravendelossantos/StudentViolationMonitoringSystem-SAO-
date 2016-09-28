<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
           Schema::create('second_semester', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start');
            $table->date('end');
            

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('second_semester');
    }
}
