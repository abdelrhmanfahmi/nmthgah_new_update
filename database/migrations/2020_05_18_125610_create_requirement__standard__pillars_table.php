<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementStandardPillarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement__standard__pillars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('attachments');
            $table->string('annual_repetition');
            $table->string('target_value');
            $table->integer('target_value_type');
            $table->string('audit_result');
            $table->integer('audit_result_type');
            $table->boolean('matching');
            $table->integer('standard_pillar_id')->unsigned();
            $table->foreign('standard_pillar_id')->references('id')->on('standard__pillars');
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
        Schema::dropIfExists('requirement__standard__pillars');
    }
}
