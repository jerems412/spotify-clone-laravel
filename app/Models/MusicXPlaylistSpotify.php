<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicXPlaylistSpotify extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'musicxplaylistspotifys';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * date Ajout.
     *
     * @var string
     */
    protected $dateAjout = 'dateAjout';

    //relations

    public function spotifyplaylists()
    {
        return $this->hasMany('App\Models\SpotifyPlaylist');
    }

    public function musiques()
    {
        return $this->hasMany('App\Models\Musique');
    }
}
