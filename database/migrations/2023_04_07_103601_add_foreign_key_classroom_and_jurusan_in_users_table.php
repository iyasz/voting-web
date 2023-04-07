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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('classroom_id')->nullable()->after('password');
            $table->foreign('classroom_id')->references('id')->on('classroom')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('jurusan_id')->nullable()->after('classroom_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropColumn('classroom_id');
            $table->dropColumn('jurusan_id');
        });
    }
};
