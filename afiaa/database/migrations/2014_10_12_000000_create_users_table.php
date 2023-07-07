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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password')->password();
            $table->string('phone');
            $table->integer('role');
            $table->integer('gender');
            $table->date('birth_date');
            $table->integer('blood_type');
            $table->string('chronic_disease');
            $table->string('genetic_disease');
            $table->string('other_info');
            $table->float('tall');
            $table->float('weight');
            $table->string('photo_url');
            $table->string('univairsity_license_url');
            $table->string('license_url');
            $table->boolean('avaliabel_for_meeting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
