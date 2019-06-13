<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostalcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postalcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->string('code', 10);
            $table->string('place', 10);
            $table->string('neighborhood', 10);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postalcodes');
    }
}
