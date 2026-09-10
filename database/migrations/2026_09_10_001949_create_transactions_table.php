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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->foreignId('flat_id')
                  ->constrained('flats', 'flat_id')
                  ->onDelete('cascade');
            $table->foreignId('tenant_id')
                  ->constrained('users', 'user_id')
                  ->onDelete('cascade');
            $table->foreignId('landlord_id')
                  ->constrained('users', 'user_id')
                  ->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_price');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
