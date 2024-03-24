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
        Schema::table('packages', function (Blueprint $table) {
            $table->text("description")->nullable()->change();
            $table->string("cpu")->nullable()->change();
            $table->string("memory")->nullable()->change();
            $table->string("storage")->nullable()->change();
            $table->boolean('recommended')->default(false)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->text("description")->change();
            $table->string("cpu")->change();
            $table->string("memory")->change();
            $table->string("storage")->change();
            $table->boolean('recommended')->default(false)->change();
        });
    }
};
