<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->text('photo')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone_number', 14)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

    		Schema::table('order', function(Blueprint $table){
    			$table->foreign('user')
    				   ->references('id')
    				   ->on('users')
    				   ->onDelete('cascade')
    				   ->onUpdate('cascade');
    		});

        Schema::table('order', function(Blueprint $table){
          $table->foreign('admin')
               ->references('id')
               ->on('users')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });

        Schema::table('product', function(Blueprint $table){
          $table->foreign('admin')
               ->references('id')
               ->on('users')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::table('order', function(Blueprint $table){
          $table->dropForeign('order_admin_foreign');
        });

        Schema::table('order', function(Blueprint $table){
          $table->dropForeign('order_user_foreign');
        });

        Schema::table('product', function(Blueprint $table){
          $table->dropForeign('product_admin_foreign');
        });

        Schema::dropIfExists('users');
    }
}
