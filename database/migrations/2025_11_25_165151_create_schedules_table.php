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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('destination_id');
            //foreign key
            $table->foreign('origin_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('routes')->onDelete('cascade');



            $table->string('distance');
            $table->foreignId("trains_id")->constrained("trains")->onDelete("cascade");

            $table->time("departure");
            $table->time("arrival");
            $table->decimal("price", 10, 2);
            $table->timestamps();
            $table->unique(["origin_id", "destination_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
