<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_titles');
            $table->string('short_ar_titles');
            $table->string('fr_titles');
            $table->string('short_fr_titles');
            $table->text('ar_contents');
            $table->text('short_ar_contents');
            $table->text('fr_contents');
            $table->text('short_fr_contents');
            $table->string('images');
            $table->enum('stat', ['nouvelles','apres-bac']);
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
        Schema::drop('articles');
    }
}
