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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('sm')->unique(); // Serijinis numeris
            $table->decimal('kaina', 8, 2);
            $table->foreignId('dalisid')->constrained('dalis');
            $table->foreignId('userid')->constrained('users');
            $table->foreignId('statusasid')->constrained('vienetas_statusas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
