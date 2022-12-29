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
        Schema::create('boulis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('name');
            $table->string('key_value')->unique();
            $table->string('description');
            $table->string('social_network');
            $table->string('requirement');
            $table->string('reward');
            $table->boolean('condition')->default(0);
            $table->timestamp('date_start');
            $table->timestamp('date_finish');
            $table->foreignUuid('brand_id')->nullable(false)->onCascade('delete');
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
        Schema::dropIfExists('boulis');
    }
};
