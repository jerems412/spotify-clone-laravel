<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeAlbum extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likealbums';

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * date Like.
     *
     * @var string
     */
    protected $dateLike = 'dateLike';

    //relations

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function albums()
    {
        return $this->hasMany('App\Models\Album');
    }
}
