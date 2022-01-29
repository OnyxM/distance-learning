<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("title");
            $table->string("slug");
            $table->string("content");
            $table->string("td")->nullable();
            $table->string("tp")->nullable();
            $table->integer("course_id");
            $table->uuid("part_uuid");
            $table->timestamps();
        });

        // DB::update("ALTER TABLE parts AUTO_INCREMENT = 97866;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
