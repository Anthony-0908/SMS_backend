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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Email')->unique();
            $table->string('Photo')->nullable();
            $table->string('Username');
            $table->string('password');
            $table->enum('account_type' , ['SuperAdmin', 'Admin ', 'Teacher_1' ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_admins');
    }
};
