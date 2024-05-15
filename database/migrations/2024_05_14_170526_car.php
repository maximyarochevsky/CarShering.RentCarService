<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->boolean('booking_status');
            $table->integer('model');
            $table->integer('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
