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
        Schema::table('portfolio_images', function (Blueprint $table) {
            $table->string('type')->comment('1 = PortfolioMainImage, 2 = PortfolioHeroImage, 3 = PortfolioCarouselImage')->after('image_path');
        });
    }
};
