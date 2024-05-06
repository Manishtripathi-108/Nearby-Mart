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
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->string('photo_main')->default('add-product.jpg');
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('name');
            $table->tinyInteger('rating')->default(0);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->enum('discount_type', ['Fixed', 'Percentage'])->nullable();
            $table->boolean('available')->default(true);
            $table->text('description')->nullable();
            $table->unsignedInteger('stock');
            $table->unsignedInteger('units_sold')->default(0);
            $table->integer('measure');
            $table->enum('sold_by', ['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz']);
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
