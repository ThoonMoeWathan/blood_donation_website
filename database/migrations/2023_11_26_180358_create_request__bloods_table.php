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
        Schema::create('request__bloods', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('require_for');
            $table->integer('blood_id');
            $table->string('relation');
            $table->integer('status')->default(0); // 0 -> pending / 1 -> success / 2 -> rejected
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request__bloods');
    }
};
