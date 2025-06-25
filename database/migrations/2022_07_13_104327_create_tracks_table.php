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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id()->from(401001);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('order')->nullable();
            $table->string('title');
            $table->string('label')->nullable();
            $table->string('link');
            $table->foreignId('admin_id')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('content_id')->constrained('contents')->comment('content')->onDelete('cascade');
            $table->integer('isValid')->default(0);
            $table->integer('isFree')->default(0);
            $table->string('track')->nullable();
            $table->string('duration')->nullable();
            $table->string('volume')->nullable();
            $table->integer('source_id')->nullable();
            $table->foreignId('soundscape_id')->nullable()->unsigned()->constrained('soundscapes');
            $table->softDeletes();
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
        Schema::dropIfExists('tracks');
    }
};
