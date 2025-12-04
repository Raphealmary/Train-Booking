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
        Schema::create('user_book_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->string("booking_id");
            $table->string("trainBooking");
            $table->string("coachBooking");
            $table->string("seatBooking");
            $table->integer("departBooking");
            $table->integer("arrivalBooking");
            $table->string("timeArrivalBooking");
            $table->string("timeDepartBooking");
            $table->string("priceBooking");
            $table->string("orignalPriceBooking");
            $table->string("dateBooking");
            $table->integer("passengerBooking");
            $table->string("fullname");
            $table->string("phone");
            $table->string("email");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_book_records');
    }
};
