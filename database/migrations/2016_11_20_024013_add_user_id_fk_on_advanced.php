<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdFkOnAdvanced extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advanceds', function (Blueprint $table) {
            //
           
            $table->integer('user_id')->unsigned()->indexed()->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advanceds', function (Blueprint $table) {
            //

            DB::statement('ALTER TABLE advanceds DROP FOREIGN KEY advanceds_user_id_foreign');
            $table->dropColumn(['user_id']);

        });
    }
}
