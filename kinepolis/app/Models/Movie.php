<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{

    use HasFactory;

    protected $fillable = ['likes'];
    //solves Laravel Unknown Column 'updated_at'(below)
    public $timestamps = false;

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

    public static function getMovies(): array
    {
        return DB::select('select m.idMovie, m.title,m.likes from movies m');
    }

    public static function getShowsById($movieId)
    {
       return DB::select('select SUBSTRING_INDEX(s.start," ",1) as jour, SUBSTRING_INDEX(s.start," ",-1) as heure ,s.idRoom,m.title from movies m left join shows s on m.idMovie=s.idMovie where m.idMovie=?', [$movieId]);

    }

}
