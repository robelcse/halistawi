<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) { 
            $table->bigIncrements('checkin_id');
            $table->unsignedBigInteger('national_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->string('checked_in_time')->nullable();
            $table->string('dependent_id')->nullable();

            // $table->foreign('patient_id')a
            //       ->references('patient_id')->on('patients')
            //       ->onDelete('cascade');
             
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
        Schema::dropIfExists('checkins');
    }
}
