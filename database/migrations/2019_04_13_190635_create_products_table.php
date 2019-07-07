<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('name', 100)->unique();
            $table->double('cost_price', 10, 2);
            $table->double('sale_price', 10, 2);
            $table->string('photo', 180)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('category_id')
                                ->references('id')
                                ->on('categories')
                                ->onDelete('cascade');
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
