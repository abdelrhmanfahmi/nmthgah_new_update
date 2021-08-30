<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('isSubmit');
            $table->integer('isChecked');
            $table->string('bankImage');
            $table->integer('guest_id')->unsigned();
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::dropIfExists('guest_courses');
    }
}
