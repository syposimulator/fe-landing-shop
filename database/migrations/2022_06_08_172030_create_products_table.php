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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc')->nullable();
            $table->text('content')->nullable();
            $table->string('keywords')->nullable();
            $table->string('harga_asli')->default(0);
            $table->string('harga_diskon')->default(0);
            $table->text('link_checkout')->nullable();
            $table->text('media')->nullable();
            $table->string('hash')->unique()->index()->collation('utf8_bin');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
