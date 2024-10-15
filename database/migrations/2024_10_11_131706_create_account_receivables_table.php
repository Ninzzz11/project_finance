<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('account_receivables', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('invoice_no');
            $table->integer('terms');
            $table->date('start_date');
            $table->date('due_date');
            $table->integer('grand_total');
            $table->integer('serviceId');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->timestamp('updated_at');
            $table->timestamp('created_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_receivables');
    }
};
