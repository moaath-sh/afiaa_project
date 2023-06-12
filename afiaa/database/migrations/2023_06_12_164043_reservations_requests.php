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
        Schema::create('reservation_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id')->unsigned();
            $table->unsignedBigInteger('sender')->unsigned();
            $table->date('date_time');
            $table->string('massage');
            $table->timestamps();
        });
        Schema::table('reservation_requests', function($table)
        {
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
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
