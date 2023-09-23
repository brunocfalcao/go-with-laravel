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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('identifier')->nullable();
            $table->integer('order_number')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('currency_rate', 10, 8)->nullable();
            $table->string('tax_name')->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->string('status')->nullable();
            $table->boolean('refunded')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('discount_total', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('subtotal_usd', 10, 2)->nullable();
            $table->decimal('discount_total_usd', 10, 2)->nullable();
            $table->decimal('tax_usd', 10, 2)->nullable();
            $table->decimal('total_usd', 10, 2)->nullable();
            $table->string('subtotal_formatted')->nullable();
            $table->string('discount_total_formatted')->nullable();
            $table->string('tax_formatted')->nullable();
            $table->string('total_formatted')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('variant_name')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->text('receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
