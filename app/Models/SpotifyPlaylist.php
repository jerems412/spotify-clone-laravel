<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotifyPlaylist extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'spotifyplaylists';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * date.
     *
     * @var string
     */
    protected $dateCreation = 'dateCreation';
    /**
     * name playlist.
     *
     * @var string
     */
    protected $namePlaylist = 'namePlaylist';
    /**
     * description.
     *
     * @var string
     */
    protected $description = 'description';
    /**
     * genre.
     *
     * @var string
     */
    protected $genre = 'genre';

    //relations

    public function musicxplaylistspotifys()
    {
        return $this->belongsTo('App\Models\MusicXPlaylistSpotify');
    }

    public function likeplaylists()
    {
        return $this->belongsTo('App\Models\LikePlaylist');
    }
}
