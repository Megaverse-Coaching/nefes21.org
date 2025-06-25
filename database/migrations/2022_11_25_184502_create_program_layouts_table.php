<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('program_layouts', function (Blueprint $table) {
            $table->id();
            $table->boolean('isDiscounted');
            $table->string('label_id')->nullable()->default(null);
            $table->integer('order');

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
        Schema::dropIfExists('program_layouts');
    }
};
