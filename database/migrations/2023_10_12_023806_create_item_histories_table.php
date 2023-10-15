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
    Schema::create('item_histories', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('item');
        $table->timestamp('updated_on');
        $table->unsignedBigInteger('updated_by');
        $table->string('action');

        $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('item')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_histories');
    }
};
