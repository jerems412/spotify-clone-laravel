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
        Schema::create('musicxplaylistspotifys', function (Blueprint $table) {
            $table->id();
            $table->string('dateAjout');
            $table->bigInteger('musique_id')->unsigned();
            $table->foreign('musique_id')->references('id')->on('musiques');
            $table->bigInteger('spotifyplaylist_id')->unsigned();
            $table->foreign('spotifyplaylist_id')->references('id')->on('spotifyplaylists');
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
        Schema::dropIfExists('musicxplaylistspotifys');
    }
};
