<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePillarConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pillar_consultants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pillar_id')->unsigned();
            $table->foreign('pillar_id')->references('id')->on('pillars');
            $table->integer('consultant_id')->unsigned();
            $table->foreign('consultant_id')->references('id')->on('consultants');
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
        Schema::dropIfExists('pillar_consultants');
    }
}
