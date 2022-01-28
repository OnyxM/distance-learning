<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("title");
            $table->string("slug");
            $table->string("price");
            $table->text("description");
            $table->uuid("uuid");
            $table->string("photo");
            $table->integer("category_id");
            $table->integer("user_id");
            $table->timestamps();
        });

        DB::update("ALTER TABLE courses AUTO_INCREMENT = 25365;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
