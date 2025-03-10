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
        Schema::create('loadings_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('equipment_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('loadings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('city')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('loadtype')->nullable();
            $table->string('equipment')->nullable();
            $table->string('loading_types')->nullable();
            $table->string('equipment_types')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            // $table->string('priority')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->string('destination_lng')->nullable();
            $table->string('destination_lat')->nullable();
            $table->string('origin_lat')->nullable();
            $table->string('origin_lng')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loadings');
    }
};
