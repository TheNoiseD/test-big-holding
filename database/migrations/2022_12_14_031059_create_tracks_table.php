<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('route');
            $table->string('request_type');
            $table->string('ip');
            $table->string('user_agent');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('tracks');
    }
};
