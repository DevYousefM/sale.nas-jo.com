<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalTranslationsTable extends Migration
{
    
    public function up()
    {
        Schema::create('modal_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modal_id');
            $table->string('locale')->index();
            $table->string('brand');
            $table->string('modal');
            $table->unique(['modal_id', 'locale']);
            $table->foreign('modal_id')->references('id')->on('modals')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('modal_translations');
    }
}
