<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpbagentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppbagents', function (Blueprint $table) {
            $table->bigIncrements('ppbagent_id');
            $table->string('device_id');
            $table->string('name');
            $table->string('pin');
            $table->string('pin_attachment')->nullable();
            $table->string('c_12');
            $table->string('note')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('ppbagents');
    }
}
