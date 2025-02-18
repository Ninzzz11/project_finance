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
        Schema::dropIfExists('account_payables');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('account_payables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};
