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
        Schema::create('advices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->unsigned();
            $table->unsignedBigInteger('specialty_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('advices', function($table)
        {
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('specialtys')->onDelete('cascade');
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
