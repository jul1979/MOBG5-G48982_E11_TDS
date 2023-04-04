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


}
