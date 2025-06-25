<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_label');
            $table->string('product_title');
            $table->string('program_title')->nullable();
            $table->enum('product_type', ['subscription', 'program']);
            $table->enum('product_group', ['main', 'discounted']);
            $table->enum('environment', ['production']);
            $table->string('reward')->nullable();
            $table->bigInteger('duration')->nullable();
            $table->string('plan')->nullable();

            $table->foreignId('program_id')->nullable()->unsigned()->constrained('programs', 'program_id');
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
