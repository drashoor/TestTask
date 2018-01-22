<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            // UUID Primary Key
            $table->uuid('pkey')->index();

            // Tokeet Account - Required
            $table->string('account', 50);

            // Required Columns
            $table->string('name', 100);
            $table->dateTime('due');
            $table->string('list');
            $table->uuid('user_id');
            $table->tinyInteger('status');

            // Optional Columns
            $table->uuid('inquiry_id')->nullable();
            $table->boolean('archived')->default(0);
            $table->text('notes')->nullable();

            $table->timestamps();

            // $table->integer('created_at');
            // $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
