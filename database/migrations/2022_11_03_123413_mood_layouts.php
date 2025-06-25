<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mood_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('mood_id')->index();
            $table->foreignId('content_id')->constrained('contents')->comment('content')->onDelete('cascade');
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');
            $table->foreign('mood_id')->references('mood_id')->on('moods');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mood_layouts');
    }
};
