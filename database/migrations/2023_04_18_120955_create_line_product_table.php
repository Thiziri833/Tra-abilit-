<?php

use App\Models\Line;
use App\Models\product;
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
        Schema::create('line_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_id')->constrained();
            $table->foreignId('product_id')->constrained();
            // $table->foreignIdFor(product::class);
            // $table->foreignIdFor(Line::class);
            $table->integer('cadence');
            $table->enum('uniteprod',['kg','L','unit']);
            $table->softDeletes();
            $table->string('remember_token', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_product');
    }
};
