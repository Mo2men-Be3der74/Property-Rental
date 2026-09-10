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
        Schema::create('flats', function (Blueprint $table) {
            $table->id('flat_id');
            $table->foreignId('owner_id')
                  -> canstrained('users', 'user_id')
                  -> onDelete('cascade');
            $table->string('category');
            $table->decimal('size', 8, 2);
            $table->decimal('price_per_month', 7, 2);
            $table->string('location');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
