<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->integer('stock')->nullable();
            $table->integer('sale_id')->unsigned()->index()->nullable();

            $table->foreign('sale_id')->references('id')->on('sales')->onUpdate('set null')->onDelete('set null');
            // $table->float('price',8,2)->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE products DROP FOREIGN KEY products_sale_id_foreign');
            $table->dropColumn(['stock','sale_id']);
            // $table->integer('price')->change();
        });
    }
}
