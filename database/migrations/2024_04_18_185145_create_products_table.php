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
            $table->unsignedBigInteger('store_id');
            $table->string('photo_main')->default('no-photo.jpg');
            $table->string('photo_1')->default('no-photo.jpg');
            $table->string('photo_2')->default('no-photo.jpg');
            $table->string('name');
            $table->tinyInteger('rating')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->enum('discount_type', ['fixed', 'percentage'])->nullable();
            $table->enum('availability', ['available', 'unavailable']);
            $table->text('description')->nullable();
            $table->unsignedInteger('stock');
            $table->unsignedInteger('units_sold')->default(0);
            $table->integer('measure');
            $table->enum('sold_by', ['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz']);
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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
