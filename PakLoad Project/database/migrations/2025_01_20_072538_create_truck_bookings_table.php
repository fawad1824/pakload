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
        Schema::create('truck_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('description');
            $table->string('mode');
            $table->string('type');
            $table->string('city_id');
            $table->string('truck_type');
            $table->string('load_type');
            $table->string('origin_locations');
            $table->string('destination_locations');
            $table->string('requirements');
            $table->string('price');
            $table->string('qty_trucks');
            $table->string('date');
            $table->string('time');
            $table->string('type_of_service');
            $table->string('extra_services');
            $table->string('labour');
            $table->string('floor_pickup');
            $table->string('floor_dropoff');
            $table->string('status');

            $table->string('vehicle_type');
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_bookings');
    }
};
