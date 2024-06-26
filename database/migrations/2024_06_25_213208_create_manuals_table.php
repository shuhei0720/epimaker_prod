<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualsTable extends Migration
{
    public function up()
    {
        Schema::create('manuals', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manuals');
    }
};