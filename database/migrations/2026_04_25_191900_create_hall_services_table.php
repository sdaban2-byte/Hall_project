<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('hall_services', function (Blueprint $table) { $table->id(); $table->foreignId('hall_id')->constrained('halls')->cascadeOnDelete(); $table->foreignId('service_id')->constrained('services')->cascadeOnDelete(); $table->timestamps(); $table->unique(['hall_id','service_id']); }); }
    public function down(): void { Schema::dropIfExists('hall_services'); }
};
