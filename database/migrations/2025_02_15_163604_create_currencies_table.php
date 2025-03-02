<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Currency name (e.g., United States Dollar)
            $table->string('currency_code', 3)->unique(); // ISO 4217 currency code (e.g., USD)
            $table->string('currency_symbol')->nullable(); // Currency symbol (e.g., $)
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the currency
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};

