<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    //
    public $timestamps = false;



    protected $fillable = ['soldTickets'];





    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idShow';



    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


}
