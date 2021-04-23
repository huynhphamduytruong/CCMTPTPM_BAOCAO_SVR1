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
            $table->string('name')->nullable();
            $table->longText('description');
            $table->string('img_url')->default('https://picsum.photos/600');
            $table->double('price')->default(0);
            $table->string('screen')->nullable();
            $table->string('resolution')->nullable();
            $table->string('ram')->nullable();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->string('storage')->nullable();
            $table->boolean('discontinued')->default(false);
            $table->foreignId('category_id')->nullable()->constrained(); //->references('id')->on('categories');
            $table->foreignId('brand_id')->nullable()->constrained(); //->references('id')->on('brands');
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
