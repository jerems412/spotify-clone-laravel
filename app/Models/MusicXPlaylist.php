<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicXPlaylist extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'musicxplaylists';

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

    public function playlists()
    {
        return $this->hasMany('App\Models\Playlist');
    }

    public function musiques()
    {
        return $this->hasMany('App\Models\Musique');
    }
}
