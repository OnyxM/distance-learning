<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('course_user', function (Blueprint $table) {
//            $table->id();
//            $table->integer("course_id");
//            $table->integer("user_id");
//            $table->string("registration_date");
//            $table->text("comment")->nullable();
//            $table->string("playback_level");
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
