<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('deck_layouts', function (Blueprint $table) {
            $table->id()->startingValue(000001);
            $table->integer('card_id')->index();
            $table->foreignId('content_id')->nullable()->unsigned()->constrained('contents');
            $table->foreignId('deck_id')->nullable()->unsigned()->constrained('decks');
            $table->string('title');
            $table->text('description');
            $table->boolean('daily')->default(true);
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('admins');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('admins');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deck_layouts');
    }
};
