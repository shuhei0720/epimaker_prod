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
            $table->string('when')->nullable();
            $table->string('where')->nullable();
            $table->string('who')->nullable();
            $table->string('what')->nullable();
            $table->string('do')->nullable();
            $table->string('why')->nullable();
            $table->string('how')->nullable();
            $table->string('point')->nullable();
            $table->text('beginning')->nullable();
            $table->text('development')->nullable();
            $table->text('turnand')->nullable();
            $table->text('conclusion')->nullable();
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
