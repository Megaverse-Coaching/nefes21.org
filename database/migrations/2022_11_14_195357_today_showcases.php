<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('today_showcases', function (Blueprint $table) {
            $table->bigIncrements('id')->from(701000);
            $table->string('action');
            $table->string('actionUrl')->nullable();
            $table->foreignId('content_id')->nullable()->unsigned()->constrained('contents');
            $table->string('method');
            $table->integer('priority');
            $table->string('imageUrl')->nullable();
            $table->boolean('isFree')->nullable();
            $table->boolean('isValid')->nullable();
            $table->string('showcase_id')->index();
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');
            $table->foreign('showcase_id')->references('showcase')->on('showcases');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('today_showcases');
    }
};
