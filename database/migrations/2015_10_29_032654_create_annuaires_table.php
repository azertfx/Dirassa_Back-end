<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnuairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annuaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_ar_name');
            $table->string('res_fr_name');
            $table->string('full_fr_name');
            $table->string('ville');
            $table->string('domain');
            $table->enum('secteur', ['public','prive']);
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
        Schema::drop('annuaires');
    }
}
