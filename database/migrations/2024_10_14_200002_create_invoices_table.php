<?php

use App\Models\Accounts;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ar_services');
        Schema::dropIfExists('ar_invoices');
        Schema::dropIfExists('ar_accounts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('ar_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('ar_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Accounts::class)->constrained('ar_accounts')->onDelete('cascade');
            $table->string('status');
            $table->string('terms');
            $table->date('start_date');
            $table->date('due_date');
            $table->decimal('grand_total', 10, 2);
            $table->decimal('outstanding_amount', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('ar_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Accounts::class)->constrained('ar_accounts')->onDelete('cascade');
            $table->foreignId('invoice_id')->constrained('ar_invoices')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }
}
