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
        Schema::table('galleries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('category_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

};
