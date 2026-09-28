<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The manual gateway let the payer settle their own payment by pressing
     * one button, which means the person claiming to have paid was also the
     * person deciding the money arrived. These columns carry the operator's
     * decision so settlement is a two-party action.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // pending | in_review | paid | failed | expired | refunded
            $table->string('status')->default('pending')->change();

            $table->timestamp('submitted_at')->nullable()->after('expires_at');

            // Who decided, and when. Kept apart from payload so the audit
            // trail survives a gateway that overwrites its own blob.
            $table->foreignId('reviewed_by')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable()->after('reviewed_by');
            $table->text('review_note')->nullable()->after('reviewed_at');

            // The operator queue is "awaiting a human, oldest first".
            $table->index(['status', 'submitted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['status', 'submitted_at']);
            $table->dropConstrainedForeignId('reviewed_by');
            $table->dropColumn(['status', 'submitted_at', 'reviewed_at', 'review_note']);
        });
    }
};
