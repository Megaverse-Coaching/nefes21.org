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
    public function up(): void
    {
        Schema::create('dimension_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->index();
            $table->string('dimension_id')->index();
            $table->string('showcase_id')->nullable()->index();
            $table->foreignId('content_id')->nullable()->unsigned()->constrained(table: 'contents');
            $table->foreignId('soundscape_id')->nullable()->unsigned()->constrained('soundscapes');
            $table->integer('category_order')->nullable();

            $table->foreignId('created_by')->default(801000)->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->default(801000)->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->default(801000)->unsigned()->constrained('admins');

            $table->foreign('category_id')->references('category')->on('categories');
            $table->foreign('dimension_id')->references('dimension')->on('dimensions');
            $table->foreign('showcase_id')->references('showcase')->on('showcases');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('dimension_layouts');
    }
};
