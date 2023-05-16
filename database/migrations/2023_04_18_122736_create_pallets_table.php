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
        Schema::create('pallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('SSCC')->unique();
            $table->date('datefab');
            $table->date('DLUO');
            $table->integer('quantiteplt');
            $table->timestamps();
            $table->foreignId('priting_id')->references('id')->on('pritings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pallets');
    }
};
