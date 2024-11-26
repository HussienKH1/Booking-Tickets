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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->integer('ticket_count')->default(1);
            $table->decimal('ticket_price', 8, 2);
            $table->decimal('total_price', 8, 2);
            $table->decimal('vat', 8, 2);
            $table->decimal('amount_payable', 8, 2);
            $table->string('type');
            $table->string('name');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};