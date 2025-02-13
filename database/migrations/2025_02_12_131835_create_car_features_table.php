<?php

use App\Models\Car;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_features', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->primary();
            $table->boolean('Air_Conditioning')->default(false)->nullable();
            $table->boolean('Power_Windows')->default(false)->nullable();
            $table->boolean('Power_DoorLocks')->default(false)->nullable();
            $table->boolean('ABS')->default(false)->nullable();
            $table->boolean('Cruise_Control')->default(false)->nullable();
            $table->boolean('Bluetooth_Connectivity')->default(false)->nullable();
            $table->boolean('Remote_Start')->default(false)->nullable();
            $table->boolean('GPS')->default(false)->nullable();
            $table->boolean('Heated_Seats')->default(false)->nullable();
            $table->boolean('Climate_Control')->default(false)->nullable();
            $table->boolean('Rear_ParkingSensors')->default(false)->nullable();
            $table->boolean('Leather_Seats')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_features');
    }
};
