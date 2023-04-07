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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('total_rooms');
            $table->string('amenities')->nullable();
            $table->integer('room_size')->nullable();
            $table->integer('total_beds')->nullable();
            $table->integer('total_bathrooms')->nullable();
            $table->integer('total_balconies')->nullable();
            $table->integer('total_quests')->nullable();
            $table->text('feature_photo');
            $table->string('video_id')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
