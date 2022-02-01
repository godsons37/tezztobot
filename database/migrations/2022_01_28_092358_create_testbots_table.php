<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestbotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testbots', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('qty');
            $table->text('desc');
            $table->integer('price');
            $table->text('img');
            $table->integer('availability');
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
        Schema::dropIfExists('testbots');
    }
}
