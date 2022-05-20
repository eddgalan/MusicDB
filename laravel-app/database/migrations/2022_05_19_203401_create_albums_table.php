<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title',150)->unique();
            $table
                ->bigInteger('artist_id')
                ->default(null)
                ->unsigned();
            $table
                ->foreign('artist_id')
                ->references('id')
                ->on('artists')
                ->after('title');
            $table->date('date');
            $table->string('genre',50);
            $table->string('description',250)->nullable();
            $table->string('pathimg',150);
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
        Schema::dropIfExists('albums');
    }
}
