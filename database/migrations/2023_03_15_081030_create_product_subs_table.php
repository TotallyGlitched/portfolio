<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('prod_id')->nullable();
            $table->json('data')->nullable();
            $table->json('pricing')->nullable();
            $table->text('loc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_subs');
    }
};
