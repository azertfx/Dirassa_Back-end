<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id');
            $table->string('ar_title');
            $table->string('fr_title');
            $table->enum('round', ['1ere-session','2eme-session']);
            $table->string('lesson_pdf');
            $table->string('exercice_pdf');
            $table->string('exercice_corr_pdf');
            $table->string('sommary_pdf');
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
        Schema::drop('lessons');
    }
}
