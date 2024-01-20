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
        Schema::create('package_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("package_id")->constrained();
            $table->text("domain_name")->nullable();
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->string("ip_address")->nullable();
            $table->string('payment_image')->nullable();
            $table->enum("status", ["reviewing", "in progress", "delivered"])->nullable();
            $table->date("expire_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_user');
    }
};
