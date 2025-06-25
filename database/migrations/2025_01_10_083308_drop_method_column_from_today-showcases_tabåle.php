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
        Schema::table('today_showcases', function (Blueprint $table) {
            $table->dropColumn('method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('today_showcases', function (Blueprint $table) {
            // Geri dönmek istersen kolonu yeniden oluştur
            $table->string('method')->nullable();
        });
    }
};
