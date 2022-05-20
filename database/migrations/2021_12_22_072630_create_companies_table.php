<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('company_id');
            $table->string('device_id');
            $table->string('name');
            $table->string('c_12');
            $table->string('pin');
            $table->string('pin_attachment')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('p_o_box');
            $table->string('city');
            $table->string('country');
            $table->string('sub_country');
            $table->string('location')->nullable();
            $table->string('gps_pin')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
