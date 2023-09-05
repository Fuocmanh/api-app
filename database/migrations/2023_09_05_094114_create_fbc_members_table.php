<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fbc_members', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone',255);
            $table->string('address', 255);
            $table->integer('point')->default(0);
            $table->integer('status')->default(0);
            $table->integer('verification_code')->default(0);
            $table->timestamps();
            // Ràng buộc khoá ngoại với bảng fbc_roles
            $table->unsignedBigInteger('role_id')->default(1);
            $table->foreign('role_id')->references('id')->on('fbc_roles')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fbc_members');
    }
};
