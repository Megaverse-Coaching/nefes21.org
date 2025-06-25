<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('showcase_pools', function (Blueprint $table) {
            $table->id();
            $table->string('dimension_id')->index();
            $table->foreignId('content_id')->constrained('contents');
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');
            $table->foreign('dimension_id')->references('dimension')->on('dimensions');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('showcase_pools');
    }
};
