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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('dob');
            $table->string('marital_status');
            $table->date('wedding_anniversary')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->string('plan');
            $table->string('remember_token')->nullable();
            $table->boolean('mail')->nullable();
            $table->boolean('sms')->nullable();
            $table->boolean('call')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
