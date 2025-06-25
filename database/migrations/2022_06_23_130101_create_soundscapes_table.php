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
        if(!Schema::hasTable('soundscapes')) {
            Schema::create('soundscapes', function (Blueprint $table) {
                $table->id()->from(601001);
                $table->tinyInteger('status')->default(0);
                $table->tinyInteger('order')->nullable();
                $table->string('title');
                $table->integer('isValid')->default(0);
                $table->integer('isFree')->default(0);
                $table->string('track')->nullable();
                $table->time('duration')->nullable();
                $table->string('imgCover')->nullable();
                $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
                $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
                $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soundscapes');
    }
};
