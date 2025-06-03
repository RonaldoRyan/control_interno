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
        Schema::create('other_workers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->bigInteger('idNumber');
            $table->text('address');
            $table->bigInteger('phone');
            $table->string('email',50);
            $table->string('section',50);
            $table->text('conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OtherWorkers');

    }
};
