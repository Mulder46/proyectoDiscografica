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
        Schema::create('artist_disk', function (Blueprint $table) {
        $table->id();
        $table->foreignId('artist_id')
                  ->nullable()
                  ->constrained('artists')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('disk_id')
                  ->nullable()
                  ->constrained('disks')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
                });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
