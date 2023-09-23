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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('status_formatted')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('large_thumb_url')->nullable();
            $table->string('price')->nullable();
            $table->string('price_formatted')->nullable();
            $table->string('from_price')->nullable();
            $table->string('to_price')->nullable();
            $table->string('pay_what_you_want')->nullable();
            $table->text('buy_now_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
