<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->bigInteger('album_id')
                ->default(null)
                ->unsigned();
            $table->string('path_video',150)
                ->nullable()
                ->default(null);
            $table->string('path_stream1',150)
                ->nullable()
                ->default(null);
            $table->string('path_stream2',150)
                ->nullable()
                ->default(null);
            $table->timestamps();
            $table->foreign('album_id')
                ->references('id')
                ->on('albums')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
