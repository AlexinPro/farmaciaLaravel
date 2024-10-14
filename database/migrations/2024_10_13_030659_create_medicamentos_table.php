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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('descripcion', 100);
            $table->foreignId('id_laboratorio')->constrained('laboratorios')->onUpdate('cascade')->onDelete('restrict');
            $table->decimal('precio', 8, 2);
            $table->date('caducidad');
            $table->integer('lote');
            $table->string('porcion', 100);
            $table->string('image', 80);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
