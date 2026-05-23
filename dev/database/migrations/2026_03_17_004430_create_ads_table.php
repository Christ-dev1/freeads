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
        Schema::create('ads', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->foreignId('category_id')->constrained()->onDelete('cascade'); 
        $table->text('description');
        $table->string('condition'); 
        $table->string('photo');
        $table->decimal('price', 10, 2);
        $table->string('location');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
