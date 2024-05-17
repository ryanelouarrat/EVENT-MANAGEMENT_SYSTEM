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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('EventName');
            $table->string('Tags');
            $table->string('Categorie');
            $table->string('EventBanner');
            $table->string('EventLocation', 1024);
            $table->unsignedBigInteger('EventOwner');
            $table->foreign('EventOwner')->references('id')->on('users');
            $table->date('eventDate');
            $table->longText('Description');
            $table->string('BookingLink')->nullable();
            $table->string('colorCode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
