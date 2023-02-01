<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musique extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'musiques';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * title.
     *
     * @var string
     */
    protected $titre = 'titre';
    /**
     * duree.
     *
     * @var string
     */
    protected $duree = 'duree';

    //relations

    public function likes()
    {
        return $this->belongsTo('App\Models\Like');
    }

    public function ecoutes()
    {
        return $this->belongsTo('App\Models\Ecoute');
    }

    public function musicxplaylists()
    {
        return $this->belongsTo('App\Models\MusicXPlaylist');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Categorie');
    }

    public function albums()
    {
        return $this->hasMany('App\Models\Album');
    }

    public function artists()
    {
        return $this->hasMany('App\Models\Artist');
    }
}
