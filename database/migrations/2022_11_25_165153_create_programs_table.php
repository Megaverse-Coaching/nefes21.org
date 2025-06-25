<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id')->from('301000');
            $table->string('product_id');
            $table->string('discounted_product_id')->nullable();
            $table->string('discountRate')->nullable();
            $table->string('title');
            $table->string('version');
            $table->text('information');
            $table->text('description');
            $table->integer('duration')->nullable();
            $table->integer('partCount')->nullable();

            $table->json('gains')->nullable();
            $table->json('sections')->nullable();


            $table->boolean('isFree');
            $table->boolean('isNew');
            $table->boolean('isValid');
            $table->boolean('isOnSale');

            $table->string('bgImageUrl');
            $table->string('coverImageUrl');
            $table->string('trailerCoverImageUrl');
            $table->string('trailerUrl');

            $table->foreignId('author_id')->nullable()->unsigned()->constrained('authors', 'author_id');
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
