<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("subcategory_id")->constrained('subcategories');
            $table->foreignId("brand_id")->constrained('brands');
            $table->string("name");
            $table->string("slug");
            $table->text("description");
            $table->float("price");
            $table->integer('quantity')->nullable();
            $table->enum("status", [Product::DRAFT,Product::PUBLISHED])->default(Product::DRAFT);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
