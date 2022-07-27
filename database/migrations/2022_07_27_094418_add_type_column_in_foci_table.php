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
        Schema::table('foci', function (Blueprint $table) {
            $table->string('type')->after('id');
            $table->string('file')->nullable(true)->change();
            $table->string('filename')->nullable(true)->change();
            $table->string('title')->nullable(true)->change();
            $table->string('description')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foci', function (Blueprint $table) {
            $table->dropColumn(['type']);
            $table->string('file')->nullable(false)->change();
            $table->string('filename')->nullable(false)->change();
            $table->string('title')->nullable(false)->change();
            $table->string('description')->nullable(false)->change();
        });
    }
};
