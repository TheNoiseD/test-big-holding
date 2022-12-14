<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->decimal('amount', 8, 2);
            $table->string('details');
            $table->string('mount');
            $table->string('year');
            $table->boolean('transaction_status');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('transactions');
    }
};
