<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("cat_id");
            $table->longText("description");
            $table->mediumText("small_description");
            $table->string("original_price");
            $table->string("selling_price");
            $table->string("avatar");
            $table->string("qty");
            $table->string("tax");
            $table->tinyInteger("status")->default('0');
            $table->tinyInteger("trending");
            $table->string("meta_title");
            $table->string("meta_keywords");
            $table->string("meta_description");
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
        Schema::dropIfExists('products');
    }
}
