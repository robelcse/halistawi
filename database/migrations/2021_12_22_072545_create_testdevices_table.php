<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestdevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testdevices', function (Blueprint $table) {
            $table->bigIncrements('testdevice_id');
            $table->string('name');
            $table->string('model');
            $table->string('unique_no');
            $table->string('serial_no');
            $table->string('brand');
            $table->unsignedBigInteger('ppb_agent_id');
            $table->string('device_owner');
            $table->string('type');
            $table->string('cost_share_agreement');
            $table->string('emergency_d_c_name');  //d = device, c = contact
            $table->string('emergency_d_c_email');   
            $table->string('emergency_d_c_phone');   
            $table->integer('teststation_id');
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
        Schema::dropIfExists('testdevices');
    }
}
