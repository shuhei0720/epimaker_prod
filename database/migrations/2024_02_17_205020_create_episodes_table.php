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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('when');
            $table->string('where');
            $table->string('who');
            $table->string('what');
            $table->string('do');
            $table->string('why');
            $table->string('how');
            $table->string('point');
            $table->text('beginning');
            $table->text('development');
            $table->text('turnand');
            $table->text('conclusion');
            $table->text('episode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
