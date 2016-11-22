<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('advanceds', function (Blueprint $table) {
            $table->increments('id');
            $table->date('birthday');
            $table->string('gender');
            $table->string('street');
            $table->string('city');
            $table->string('country_id');
            $table->integer('postcode');
            $table->integer('phone');
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
        Schema::dropIfExists('advanceds');
    }
}
