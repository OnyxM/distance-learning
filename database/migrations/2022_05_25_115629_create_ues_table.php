<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ues', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code")->unique();
            $table->string("slug");
            $table->string("photo")->default("co-1.jpg");
            $table->text("description")->nullable();
            $table->text("requirements")->nullable();
            $table->text("syllabus")->nullable();
            $table->integer("semester_id");
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
        Schema::dropIfExists('ues');
    }
}
