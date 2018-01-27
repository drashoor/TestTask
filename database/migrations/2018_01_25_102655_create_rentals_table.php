<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('pkey')->unique();

            $table->string('name', 191);
            $table->string('display_name', 100)->nullable();

            $table->longText('description');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('checkin')->default(0);
            $table->integer('checkout')->default(0);
            $table->string('phone')->default();
            $table->integer('archived')->default(0);

            $table->integer('sleep_min')->default(0);
            $table->integer('sleep_max')->default(0);

            $table->decimal('long', 10, 7)->nullable();
            $table->decimal('lat', 10, 7)->nullable();

            $table->unsignedInteger('type_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();

            $table->string('color', 20)->nullable();
            $table->string('email', 100)->nullable();

            $table->text('detail')->nullable();
            $table->text('currency')->nullable();

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
        Schema::dropIfExists('rentals');
    }
}
