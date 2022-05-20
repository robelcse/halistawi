<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeststationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teststations', function (Blueprint $table) {
            $table->bigIncrements('teststation_id');
              
            $table->string('name'); 
            $table->string('type');
            $table->string('category')->nullable();
            $table->string('unique_id');
            $table->string('location')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable()->unique();  
            $table->string('po_box')->nullable();  
            $table->string('city')->nullable();  
            $table->string('country')->nullable();  
            $table->string('sub_country')->nullable();  
            $table->string('gps_pin')->nullable();  
            $table->string('words')->nullable(); 
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
        Schema::dropIfExists('teststations');
    }
}
