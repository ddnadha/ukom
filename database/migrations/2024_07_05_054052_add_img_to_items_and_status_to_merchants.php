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
        Schema::table('merchants', function (Blueprint $table) {
            $table->enum('status', ['pending', 'active', 'deactive'])->default('pending');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->string('img')->default('default.jpg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('img');
        });
    }
};
