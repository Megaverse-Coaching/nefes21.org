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
    public function up():void
    {

        Schema::create('contents', static function (Blueprint $table) {
            $table->bigIncrements('id')->from(101000);
            $table->tinyInteger('status')->default(0);
            $table->integer('version')->nullable();
            $table->json('type')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->time('duration')->nullable();
            $table->foreignId('admin_id')->constrained('admins');
            $table->integer('isFree')->default(0);
            $table->integer('isNew')->default(0);
            $table->integer('isValid')->default(0);
            $table->integer('isMulti')->default(0);
            $table->enum('gender', ['General', 'Male', 'Female', 'Private'])->nullable();
            $table->enum('age', ['General', '12-18', '19-26', '27-35', '36-45', '45+'])->nullable();
            $table->string('imgCover')->nullable();
            $table->string('imgShowcase')->nullable();
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
    public function down():void
    {
        Schema::dropIfExists('contents');
    }
};
