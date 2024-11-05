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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('release_date')->nullable();
            $table->decimal('rating', 3, 1)->nullable()->comment('Rating from 1 to 10');
            $table->integer('runtime')->nullable()->comment('Duration in minutes');
            $table->string('director')->nullable();
            $table->text('cast')->nullable()->comment('Comma-separated list of main actors');
            $table->text('synopsis')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('poster_url')->nullable();
            $table->string('trailer_url')->nullable();
            $table->boolean('availability_status')->default(true);
            $table->json('screening_times')->nullable()->comment('JSON object of available screening times');
            $table->decimal('ticket_price', 8, 2)->nullable()->comment('Ticket price in dollars');
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
        Schema::dropIfExists('movies');
    }
};
