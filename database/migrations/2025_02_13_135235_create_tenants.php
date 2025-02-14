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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('profession');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('bank_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
