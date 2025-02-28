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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('floor');
            $table->string('room_id');
            $table->string('text_id');
            $table->string('room_name')->nullable();
            $table->string('room_desc')->nullable();
            $table->string('room_head')->nullable();
            $table->string('room_contact')->nullable();
            $table->string('room_email')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
