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
        Schema::create('massages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id')->unsigned();
            $table->unsignedBigInteger('sender')->unsigned();
            $table->string('massage');
            $table->timestamps();
        });
        Schema::table('massages', function($table)
        {
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
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
