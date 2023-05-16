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
        Schema::create('lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('structure_id');
            $table->string('name',50);
            $table->string('description',200);
            $table->softDeletes();
            $table->string('remember_token', 255)->nullable();
            $table->timestamps();
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lines');
    }
};
