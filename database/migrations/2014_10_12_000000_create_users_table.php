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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('shop_name')->nullable();
            $table->string('email')->unique();

            $table->string('phone')->unique()->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('shop_logo')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('photo')->nullable();
            $table->string('shop_banner')->nullable();
            $table->enum('role', ['SuperAdmin','Admin', 'Shop'])->default('Shop');
            
            $table->foreignIdFor(\App\Models\User::class, 'parent_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
