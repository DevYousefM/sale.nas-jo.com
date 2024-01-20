<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientNotifyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_notify_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_notify_id');
            $table->string('locale')->index();
            $table->longText('message');
            $table->unique(['client_notify_id', 'locale']);
            $table->foreign('client_notify_id')->references('id')->on('client_notifies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_notify_translations');
    }
}
