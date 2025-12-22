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
        Schema::table('user_book_records', function (Blueprint $table) {
            $table->string("reference");
            $table->string("status")->default("notPaid");
            $table->string("Type");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_book_records', function (Blueprint $table) {
            //
        });
    }
};
