<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostAndFoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_and_founds', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
            $table->date('date_endorsed');
			$table->string('item_description');
			$table->string('endorser_name');
			$table->string('founded_at');
			$table->string('owner_name');
            $table->string('claimer_name');
			$table->date('date_claimed');
			$table->enum('status', array('Unclaimed','Claimed','Donated'));
			$table->date('disposal_date');
			$table->integer('reporter_id');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lost_and_founds');
    }
}
