<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleModelVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_model_version', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehicle_model_id');
            $table->unsignedInteger('version_id');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models');
            $table->foreign('version_id')->references('id')->on('versions');
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
        Schema::dropIfExists('vehicle_model_version');
    }
}
