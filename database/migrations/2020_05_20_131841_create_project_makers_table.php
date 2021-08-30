<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_makers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_address');
            $table->string('description');
            $table->string('project_result');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('project_manager_id')->unsigned();
            $table->foreign('project_manager_id')->references('id')->on('projects');
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
        Schema::dropIfExists('project_makers');
    }
}
