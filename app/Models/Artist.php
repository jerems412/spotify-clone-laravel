<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artists';

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
    protected $nameArtist = 'nameArtist';

    //relations

    public function musiques()
    {
        return $this->belongsTo('App\Models\Musique');
    }

    public function albums()
    {
        return $this->belongsTo('App\Models\Album');
    }

    public function abonnements()
    {
        return $this->belongsTo('App\Models\Abonnement');
    }
}
