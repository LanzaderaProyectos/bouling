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
        Schema::table('boulis', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('requirement');
            $table->dropColumn('reward');
        });

        Schema::table('boulis', function (Blueprint $table) {
            $table->text('description');
            $table->text('requirement');
            $table->text('reward');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boulis', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('requirement');
            $table->dropColumn('reward');
        });

        Schema::table('boulis', function (Blueprint $table) {
            $table->string('description');
            $table->string('requirement');
            $table->string('reward');
        });
    }
};
