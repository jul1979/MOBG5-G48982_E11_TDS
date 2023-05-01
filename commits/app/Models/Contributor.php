<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contributor extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //UNIQUEMENT SI ID EST DIFFERENT DE ID
    protected $primaryKey = 'login';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
   //UNIQUEMENT SI CLE PRIMAIRE NON NUMERIQUE
    public $incrementing = false;

    public function repositories(): HasMany
    {
        return $this->hasMany(Repository::class);
    }


}
