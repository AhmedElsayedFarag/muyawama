<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOptionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_option_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('service_option_id');
            $table->string('locale')->index();
            $table->unique(['service_option_id', 'locale']);
            $table->foreign('service_option_id')->references('id')->on('service_options')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_option_translations');
    }
}
