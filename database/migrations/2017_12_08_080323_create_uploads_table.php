<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name', 50)->nullable();
            $table->string('song_name', 25)->nullable();
            $table->string('duration', 15)->nullable();
            $table->integer('user_id');
            $table->string('song_artist', 50)->nullable();
            $table->string('track_title', 50)->nullable();
            $table->string('track_bpm', 50)->nullable();
            $table->string('track_genre', 50)->nullable();
            $table->string('track_age', 50)->nullable();
            $table->text('track_inspiration')->nullable();
            $table->string('cover_img')->nullable();
            $table->integer('track_percentage')->nullable();
            $table->string('track_cover_image')->nullable(); // track cover image.
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('uploads');
    }
}
