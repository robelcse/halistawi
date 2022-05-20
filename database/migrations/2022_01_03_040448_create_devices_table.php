<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id('device_id');
            $table->string('brand');
            $table->string('model')->nullable();
            $table->string('series')->nullable();
            $table->string('test_type');
            $table->text('description')->nullable();
            $table->string('device_pic')->nullable();
            $table->string('device_owner');
            $table->string('owner_type')->nullable();
            $table->string('unique_device_id')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
