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
        Schema::create('blood__banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('open_at');
            $table->string('close_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood__banks');
    }
};
