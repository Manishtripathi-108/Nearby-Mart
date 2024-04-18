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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('location_id')->unsigned();
            $table->string('profile_picture')->default('profile.png');
            $table->timestamp('dob')->nullable();
            $table->string('phone', 20);
            $table->string('email', 50);
            $table->string('address');
            $table->string('street_address');
            $table->string('city');
            $table->enum('user_type', ['Customer', 'Store Owner', 'Admin'])->default('Customer')->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
