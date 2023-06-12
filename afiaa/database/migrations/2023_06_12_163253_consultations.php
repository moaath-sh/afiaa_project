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
        Schema::create('consultation', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->integer('specialty_id');
            $table->integer('patient_id');
            $table->string('title');
            $table->string('result');
            $table->string('doctor_note');
            $table->string('patient_note');
            $table->timestamps();
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
