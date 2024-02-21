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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable()->change();
            $table->decimal('price', 8, 2); // 8 total digits, 2 decimal places
            $table->string("cpu")->nullable()->change();
            $table->string("memory")->nullable()->change();
            $table->string("storage")->nullable()->change();
            $table->boolean('recommended')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
