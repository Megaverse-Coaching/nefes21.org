<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('section_parts', function (Blueprint $table) {
            $table->id('id')->from(301000);

            $table->integer('order')->nullable();
            $table->string('duration')->nullable();
            $table->string('part_id');
            $table->boolean('isValid');
            $table->string('label');
            $table->string('title');
            $table->enum('type', ['video', 'audio', 'quest']);
            $table->integer('version');
            $table->text('quest_description')->nullable();
            $table->text('quest_information')->nullable();
            $table->string('quest_title')->nullable();
            $table->string('section_id');
            $table->string('soundscape_volume')->nullable()->default(0);
            $table->string('part_video')->nullable();
            $table->string('part_audio')->nullable();
            $table->foreignId(column: 'soundscape_id')->nullable()->unsigned()->constrained(table: 'soundscapes');
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
        Schema::dropIfExists('section_parts');
    }
};
