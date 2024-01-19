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
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');
            $table->integer('position')->nullable();
            $table->boolean('autoplay')->nullable();
            $table->boolean('add_button')->nullable();
            $table->integer('autoplay_interval')->nullable();
            $table->string('heading',200)->nullable();
            $table->boolean('show_page_indicator')->nullable();
            $table->boolean('enable_infinite_scroll')->nullable();
            $table->boolean('overlay_page_indicator')->nullable();
            $table->integer('viewport_fraction')->nullable();
            $table->integer('height')->nullable();
            $table->float('aspect_ratio')->nullable();
            $table->jsonb('images')->nullable();
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
        Schema::dropIfExists('contents');
    }
};