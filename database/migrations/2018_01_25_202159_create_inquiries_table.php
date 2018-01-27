<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('pkey');
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('rental')->nullable();
            $table->date('arrive')->nullable();
            $table->date('depart')->nullable();
            $table->date('recevied')->nullable();
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->uuid('booking_id')->nullable();
            $table->string('inquiry_id')->nullable();
            $table->string('source')->nullable();
            $table->integer('adults')->default(0);
            $table->integer('children')->default(0);
            $table->integer('cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
