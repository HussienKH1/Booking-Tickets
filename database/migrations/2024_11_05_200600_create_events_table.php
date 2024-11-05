<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('event_type');
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->decimal('ticket_price', 8, 2)->nullable()->comment('Ticket price in dollars');
            $table->string('poster_url')->nullable()->comment('URL to the event poster');
            $table->boolean('availability_status')->default(true)->comment('Whether tickets are available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
