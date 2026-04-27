<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('about_us', function (Blueprint $table) { $table->id(); $table->text('description'); $table->integer('num_halls')->default(0); $table->integer('num_booking')->default(0); $table->integer('rating')->default(0); $table->timestamps(); }); }
    public function down(): void { Schema::dropIfExists('about_us'); }
};
