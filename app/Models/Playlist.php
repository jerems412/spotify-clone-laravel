<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'playlists';

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

    //relations

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function musicxplaylists()
    {
        return $this->belongsTo('App\Models\MusicXPlaylist');
    }
}
