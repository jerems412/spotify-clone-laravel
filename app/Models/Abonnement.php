<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abonnements';

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
    protected $dateAbonnement = 'dateAbonnement';

    //relations

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function artists()
    {
        return $this->hasMany('App\Models\Artist');
    }
}
