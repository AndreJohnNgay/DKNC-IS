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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');

            $table->string('item_name');
            $table->binary('image');
            $table->string('description');
            $table->float('cost');
            $table->bigInteger('stock')->default(0);
            $table->bigInteger('stock_used_per_day');
            
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('created_by');

            // foreign keys
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
