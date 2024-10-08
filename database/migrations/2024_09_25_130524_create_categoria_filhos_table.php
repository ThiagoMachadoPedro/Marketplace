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
        Schema::create('categoria_filhos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categoria');
            $table->integer('sub_categoria_id');
            $table->string('name');
            $table->string('slug');
            $table->boolean('status');
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('categoria_filhos');
    }
};
