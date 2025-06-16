<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->timestamps();
        });

        // Users (perkelta čia, po roles)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('vardas');
            $table->string('pavarde');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('roleid')->default(2)->constrained('roles')->onDelete('restrict');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Vieneto statusai
        Schema::create('vienetas_statusas', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->timestamps();
        });

        // Nuomos statusai
        Schema::create('nuoma_statusas', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->timestamps();
        });

        // Tipai
        Schema::create('tipas', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->timestamps();
        });

        // Kategorijos
        Schema::create('kategorija', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->foreignId('tipasid')->constrained('tipas')->onDelete('cascade');
            $table->timestamps();
        });

        // Gamintojai
        Schema::create('gamintojas', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->timestamps();
        });

        // Dalys
        Schema::create('dalis', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->foreignId('kategorijaid')->constrained('kategorija')->onDelete('cascade');
            $table->foreignId('gamintojasid')->constrained('gamintojas')->onDelete('cascade');
            $table->string('pastaba')->nullable();
            $table->timestamps();
        });

        // Vienetai
        Schema::create('vienetas', function (Blueprint $table) {
            $table->id();
            $table->string('sm')->unique();
            $table->decimal('kaina', 8, 2);
            $table->foreignId('dalisid')->constrained('dalis')->onDelete('cascade');
            $table->foreignId('statusasid')->constrained('vienetas_statusas')->onDelete('restrict');
            $table->timestamps();
        });

        // Nuoma
        Schema::create('nuoma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('vienetasid')->constrained('vienetas')->onDelete('cascade');
            $table->date('pradzia');
            $table->date('pabaiga')->nullable();
            $table->foreignId('statusasid')->constrained('nuoma_statusas')->onDelete('restrict');
            $table->timestamps();
        });

        // Logas
        Schema::create('logas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('lentele');
            $table->unsignedBigInteger('iraso_id');
            $table->string('laukas');
            $table->string('senas')->nullable();
            $table->string('naujas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logas');
        Schema::dropIfExists('nuoma');
        Schema::dropIfExists('vienetas');
        Schema::dropIfExists('dalis');
        Schema::dropIfExists('gamintojas');
        Schema::dropIfExists('kategorija');
        Schema::dropIfExists('tipas');
        Schema::dropIfExists('nuoma_statusas');
        Schema::dropIfExists('vienetas_statusas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
