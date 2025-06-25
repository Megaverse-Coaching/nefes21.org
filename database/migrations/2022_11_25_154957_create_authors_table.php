<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id('author_id')->from(901000);
            $table->text('info');
            $table->string('label');
            $table->string('title');
            $table->string('name');
            $table->string('surname');
            $table->string('position')->nullable();
            $table->string('headerImageUrl');
            $table->string('profilePicUrl');
            $table->boolean('isConsulting');

            $table->foreignId('admin_id')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
