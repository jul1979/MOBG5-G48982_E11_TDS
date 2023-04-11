<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory;



    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idMovie';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public static function getMovieById($id)
    {
        return DB::select('select m.title,m.synopsis,m.rating from movies m where m.idMovie=?', [$id]);
    }

    public static function movies()
    {
        return DB::select('select m.idMovie,s.idShow,s.start, m.title,r.idRoom,(r.capacity-s.soldTickets)as available from rooms r join shows s on r.idRoom=s.idRoom join movies m on m.idMovie=s.idMovie where s.start >CURRENT_TIMESTAMP ORDER BY s.start, HOUR(CURRENT_TIMESTAMP),m.title ASC');
    }


}
