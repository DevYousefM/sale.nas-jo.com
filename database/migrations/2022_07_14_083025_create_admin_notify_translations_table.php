<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminNotifyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_notify_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_notify_id');
            $table->string('locale')->index();
            $table->longText('message');
            $table->unique(['admin_notify_id', 'locale']);
            $table->foreign('admin_notify_id')->references('id')->on('admin_notifies')->cascadeOnDelete();
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
        Schema::dropIfExists('admin_notify_translations');
    }
}
