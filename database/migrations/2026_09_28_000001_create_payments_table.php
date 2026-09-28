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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // A payment settles exactly one thing: a donation or a membership.
            $table->nullableMorphs('payable');

            // Human-facing identifier, echoed back by the gateway webhook.
            $table->string('reference')->unique();

            $table->string('gateway')->default('manual');
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('IDR');
            $table->string('method');

            // pending | paid | failed | expired | refunded
            $table->string('status')->default('pending');

            $table->string('gateway_reference')->nullable();
            $table->text('instructions')->nullable();
            $table->json('payload')->nullable();

            $table->timestamp('expires_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
