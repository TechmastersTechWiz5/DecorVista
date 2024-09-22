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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('billing_id');
            $table->string('sub_total');
            $table->string('shipping_charges');
            $table->string('grand_total');
            $table->integer('status')->default(1)->comment('1 = UnApproved, 2 = Approved, 3 = Dispatched, 4 = Completed, 5 = Rejected');
            $table->string('created_by');
            $table->date('created_date');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('billing_id')->references('id')->on('order_billing_addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
