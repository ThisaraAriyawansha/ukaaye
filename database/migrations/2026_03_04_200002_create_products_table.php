<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->foreignId('product_category_id')->constrained('product_categories')->onDelete('cascade');
            $table->text('description');
            $table->string('main_img')->nullable();
            $table->json('other_img')->nullable();
            $table->string('product_code')->nullable();
            $table->decimal('retail_price', 10, 2);
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->integer('qty')->default(0);
            $table->string('product_status')->default('in_stock');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
