<?php

use App\Models\Boy;
use App\Models\Girl;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boys_girls', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Boy::class, 'boy_id');
            $table->foreignIdFor(Girl::class, 'girl_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boys_girls');
    }
};
