<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\UUID;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Make name nullable if it's optional
            $table->string('email');
            $table->string('session_id')->unique();
            $table->string('payment_intent')->unique();
            $table->uuid('uuid')->unique(); 
            $table->timestamps();
            $table->string('valid_till')->nullable();
            $table->string('status')->nullable()->default('valid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
