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
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('Age')->default(0);
            $table->string('Gender');
            $table->text('Address');
            $table->string('Course');
            $table->string('Year');
            $table->string('BirthDay');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('Photo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_students');
    }
};
