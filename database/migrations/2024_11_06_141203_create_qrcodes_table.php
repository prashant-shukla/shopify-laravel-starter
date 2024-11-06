<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('shop');
            $table->unsignedBigInteger('productId');
            $table->string('productHandle');
            $table->unsignedBigInteger('productVariantId');
            $table->string('destination');
            $table->unsignedInteger('scans')->default(0);
            $table->timestamp('createdAt')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qrcodes');
    }
};
