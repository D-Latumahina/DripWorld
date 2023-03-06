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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('item_category');
            $table->string('item_subcategory');
            $table->string('item_brand');
            $table->string('item_size');
            $table->string('item_name');
            $table->string('item_description');
            $table->string('item_color');
            $table->integer('item_condition');
            $table->decimal('item_price',8,2);
            $table->string('item_photos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
