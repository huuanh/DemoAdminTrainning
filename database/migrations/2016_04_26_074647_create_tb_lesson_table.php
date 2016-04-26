<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_lessons', function(Blueprint $table){
            $table->increments('id');
            $table->string('lessonCode')->unique();
            $table->string('type_id');
            $table->string('part_id');
            $table->integer('pre_lesson_id');
            $table->string('lesson');
            $table->text('content');
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
        //
        Schema::drop('tb_lessons');
    }
}
