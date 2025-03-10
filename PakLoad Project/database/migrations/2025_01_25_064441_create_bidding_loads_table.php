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
        Schema::create('bidding_loads', function (Blueprint $table) {
            $table->id();
            $table->string('mani_id');
            $table->string('truck_id');
            $table->string('origin');

            $table->string('origin_lng');
            $table->string('origin_lat');

            $table->string('destinations');
            $table->string('destination_lng');
            $table->string('destination_lat');

            $table->string('load_id');
            $table->string('amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidding_loads');
    }
};
