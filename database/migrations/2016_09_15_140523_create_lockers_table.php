<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('location');
            $table->string('lessee')->nullable();
            $table->enum('status', array('Available', 'Occupied', 'Damaged', 'Locked'));
           //  $table->string('contract'); DATE range??
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lockers');
    }
}
