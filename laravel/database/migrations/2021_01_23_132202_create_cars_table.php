<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cars')){
            Schema::create('cars', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('maker');
                $table->string('price');
                $table->string('style');
                $table->string('size');
                $table->string('country');
                $table->string('uses');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
