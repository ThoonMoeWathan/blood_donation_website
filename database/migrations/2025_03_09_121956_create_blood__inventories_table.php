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
        Schema::create('blood__inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id');
            $table->integer('blood_group_id');
            $table->string('collection_date');
            $table->string('expiry_date');
            $table->string('temperature');
            $table->integer('quantity');
            $table->string('status');
            $table->string('test_result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood__inventories');
    }
};
