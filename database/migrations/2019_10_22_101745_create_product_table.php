<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin')->unsigned();
            $table->string('name', 30)->unique();
            $table->text('slug', 30);
            $table->integer('price');
            $table->text('image');
            $table->text('desc')->nullable();
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::table('order_detail', function(Blueprint $table){
          $table->foreign('product_id')
              ->references('id')
              ->on('product')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_detail', function(Blueprint $table){
          $table->dropForeign('order_detail_product_id_foreign');
        });
        Schema::dropIfExists('product');
    }
}
