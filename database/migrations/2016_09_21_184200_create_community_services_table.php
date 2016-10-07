<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_services', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('no_of_days');
            $table->time('required_hours');
            $table->time('time_in');
            $table->time('time_out');
            $table->enum('status', array('On going', 'Completed'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('community_services');
    }
}
