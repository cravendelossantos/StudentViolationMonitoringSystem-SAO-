<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('venue');       
            $table->string('organization');
            $table->enum('status', array('Available', 'Reserved', 'Banned'));
            $table->datetime('start');
            $table->datetime('end');
            $table->enum('remark_status', array('Approved', 'Disapproved'));
            $table->integer('cvf_no');
 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
