<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceoperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deviceoperations', function (Blueprint $table) {
            $table->bigIncrements('operation_id');
            $table->string('s_date_one')->nullable();
            $table->string('s_date_two')->nullable();
            $table->string('s_date_three')->nullable();
            $table->string('e_date_one')->nullable();
            $table->string('e_date_two')->nullable();
            $table->string('e_date_three')->nullable();
            $table->string('device_id')->nullable();
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
        Schema::dropIfExists('deviceoperations');
    }
}
