<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $namecategorie = 'namecategorie';
    /**
     * date Album.
     *
     * @var string
     */
    protected $color = 'color';

    //relations

    public function musiques()
    {
        return $this->belongsTo('App\Models\Musique');
    }
}
