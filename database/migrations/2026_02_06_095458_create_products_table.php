<?php

use App\Models\Category;
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
            $table->string('name');
            $table->string('slug')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default(0);
            $table->string('sku')->unique();
            $table->longText('description')->nullable();
            $table->text('description_notes')->nullable(); 
            $table->string('image')->nullable();
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->boolean('status')->default(1); // 0: active 1: inactive
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
