<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('images_overviews')->nullable();
            $table->json('images_product_process')->nullable();
            $table->json('images_package_specification')->nullable();
            $table->json('images_preservation_methods')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'images_overviews',
                'images_product_process',
                'images_package_specification',
                'images_preservation_methods',
            ]);
        });
    }
};
