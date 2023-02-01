<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'searchs';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * val.
     *
     * @var string
     */
    protected $valSearch = 'valSearch';

    //relations

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
