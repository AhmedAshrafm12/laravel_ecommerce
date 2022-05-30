<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('firstName') ;
            $table->string('lastName') ;
            $table->unsignedBigInteger('user_id');
            $table->string('country');
            $table->string('city') ;
            $table->string("address") ;
            $table->string('mobile') ;
            $table->string("email") ;
            $table->integer("status") ;
            $table->double("total");
            $table->string("payment_id");
            $table->string("payment_mood");
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
        Schema::dropIfExists('orders');
    }
}
