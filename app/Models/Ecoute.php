<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoute extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ecoutes';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * date Ecoute.
     *
     * @var string
     */
    protected $dateEcoute = 'dateEcoute';

    //relation

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function musiques()
    {
        return $this->hasMany('App\Models\Musique');
    }
}
