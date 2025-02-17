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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('sku');
            $table->integer('status')->default(1)->comment('1 = Active , 2 = Inactive');
            $table->string('created_by');
            $table->date('created_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
