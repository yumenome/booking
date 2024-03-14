<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->foreignId('doctor_id')->nullable();
            $table->foreignId('patient_id')->nullable();
            $table->time('to_cancle')->format('H:i')->nullable();
            $table->timestamp('started_time')->default(Carbon::now());
            $table->boolean('is_finnish')->default(false);
            $table->string('progress')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
