<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * name.
     *
     * @var string
     */
    protected $nameAlbum = 'nameAlbum';
    /**
     * date Album.
     *
     * @var string
     */
    protected $dateAlbum = 'dateAlbum';

    //relations

    public function artists()
    {
        return $this->hasMany('App\Models\Artist');
    }

    public function likes()
    {
        return $this->belongsTo('App\Models\Like');
    }

    public function musiques()
    {
        return $this->belongsTo('App\Models\Musique');
    }
}
