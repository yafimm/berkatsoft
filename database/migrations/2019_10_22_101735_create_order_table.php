<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->integer('user')->unsigned();
            $table->integer('admin')->unsigned();
            $table->integer('total');
            $table->enum('status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->timestamps();
        });

        Schema::table('order_detail', function(Blueprint $table){
          $table->foreign('order_id')
               ->references('id')
               ->on('order')
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
          $table->dropForeign('order_detail_order_id_foreign');
        });
        Schema::dropIfExists('order');
    }
}
