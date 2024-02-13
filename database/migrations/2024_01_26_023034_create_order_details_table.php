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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("orders_id")->constrained();
            $table->foreignId("package_id")->constrained();
            $table->string("package_name");
            $table->decimal("unit_price", 8, 2);
            $table->decimal("discount_amount", 8, 2)->nullable()->change();
            $table->decimal("total_amount", 8, 2);
            $table->string("plan");
            $table->dateTime('expired_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
