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
        Schema::create('server_creds', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_detail_id")->constrained();
            $table->string("ip_address")->nullable();
            $table->string("domain_name")->nullable();
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_creds');
    }
};
