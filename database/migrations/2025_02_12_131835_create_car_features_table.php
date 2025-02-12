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
            $table->boolean('Air_Conditioning')->default(false);
            $table->boolean('Power_Windows')->default(false);
            $table->boolean('Power_DoorLocks')->default(false);
            $table->boolean('ABS')->default(false);
            $table->boolean('Cruise_Control')->default(false);
            $table->boolean('Bluetooth_Connectivity')->default(false);
            $table->boolean('Remote_Start')->default(false);
            $table->boolean('GPS')->default(false);
            $table->boolean('Heated_Seats')->default(false);
            $table->boolean('Climate_Control')->default(false);
            $table->boolean('Rear_ParkingSensors')->default(false);
            $table->boolean('Leather_Seats')->default(false);
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
