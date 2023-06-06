<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('reference');
            $table->integer('price');
            $table->integer('weight');
            $table->integer('category_id')->nullable();
            $table->integer('stock');

            $table->double('shipping_cost')->nullable();
            $table->string('image_path')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('details')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('brand_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
