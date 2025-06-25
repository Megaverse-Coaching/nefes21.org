<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('program_sections', function (Blueprint $table) {
            $table->string('section_id')->primary();
            $table->integer('order')->nullable();
            $table->string('section_title');
            $table->foreignId(column: 'program_id')->nullable()->unsigned()->constrained(table: 'programs', column: 'program_id');
            $table->foreignId(column: 'created_by')->nullable()->default(801000)->unsigned()->constrained(table: 'admins');
            $table->foreignId(column: 'updated_by')->nullable()->default(801000)->unsigned()->constrained(table: 'admins');
            $table->foreignId(column: 'deleted_by')->nullable()->default(801000)->unsigned()->constrained(table: 'admins');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_sections');
    }
};
