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
        Schema::create('decks', function (Blueprint $table) {
            $table->id()->from(501001);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('order')->nullable();
            $table->string('title');
            $table->string('tag')->nullable();
            $table->string('color')->nullable();
            $table->integer('isValid')->default(0);
            $table->string('showcase')->nullable();
            $table->string('front')->nullable();
            $table->string('back')->nullable();
            $table->string('background')->nullable();


            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('published_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');
            $table->softDeletes();
            $table->timestamp(column: 'published_at')->nullable()->useCurrentOnUpdate();
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
        Schema::dropIfExists('decks');
    }
};
