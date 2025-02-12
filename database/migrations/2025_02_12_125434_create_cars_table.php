<?php

use App\Models\User;
use App\Models\Maker;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\FuelType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Maker::class, 'maker_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->foreignIdFor(CarModel::class, 'car_model_id');
            $table->foreignIdFor(CarType::class, 'car_type_id');
            $table->foreignIdFor(FuelType::class, 'fuel_type_id');
            $table->string('region')->nullable();
            $table->string('price');
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('publish_date')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
