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
        Schema::create('reward_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_type')->nullable();
            $table->string('reward_name')->nullable();
            $table->unsignedBigInteger('driver_completed_rides')->nullable();
            $table->unsignedBigInteger('driver_reward_points')->nullable();
            $table->unsignedBigInteger('user_completed_rides')->nullable();
            $table->unsignedBigInteger('user_reward_points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_settings');
    }
};
