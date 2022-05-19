<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('adsId')->unsignedInteger()->unique;
            $table->string('adsTitle');
            $table->string('adsCompany');
            $table->string('adsCaption');  
            $table->date('date');
            $table->string('timeslot');
            $table->string('adsStatus')->default('pending'); 
            $table->string('receipt')->default('pending'); 

            $table->unsignedInteger('custId')->index()->nullable();
            $table->foreign('custId')->references('custId')->on('users')->onDelete('cascade');
            $table->unsignedInteger('categoryId')->index()->nullable();
            $table->foreign('categoryId')->references('categoryId')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('ads');
    }
}
