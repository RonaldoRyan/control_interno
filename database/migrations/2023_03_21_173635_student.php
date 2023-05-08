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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->date('birth_date');
            $table->bigInteger('age');
            $table->text('address');
            $table->string('benefits', 50);
            $table->string('dad_name', 50)->nullable();
            $table->bigInteger('dad_phone')->nullable();
            $table->bigInteger('idNumber_dad')->nullable();
            $table->string('mom_name', 50);
            $table->bigInteger('mom_phone');
            $table->bigInteger('idNumber_mom');
            $table->string('emergency_contact', 50);
            $table->string('emergency_Idcontact', 50);
            $table->bigInteger('emergency_contact_phone');
            $table->text('vaccine_information');
            $table->text('allergies_or_conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
