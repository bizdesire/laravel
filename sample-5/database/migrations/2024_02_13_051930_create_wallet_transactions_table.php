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
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('r_payment_id')->nullable();
            $table->foreignId('user_id');
            $table->string('amount')->default(0); // in cents
            $table->enum('type', ['debit', 'credit'])->index()->comment('The type of transaction, either deposit or withdrawal');
            $table->string('balance')->default(0); // in cents
            $table->integer('relation_id')->default(0); 
            $table->string('method')->nullable();
            $table->string('currency')->nullable();
            $table->string('user_email')->nullable(); 
            $table->longText('json_response')->nullable();
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
