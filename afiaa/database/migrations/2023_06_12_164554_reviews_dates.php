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
        Schema::create('reviews_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id')->unsigned();
            $table->date('date_time');
            $table->integer('status');
            $table->integer('importance_level');
            $table->timestamps();
        });
        Schema::table('reviews_dates', function($table)
        {
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');

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
