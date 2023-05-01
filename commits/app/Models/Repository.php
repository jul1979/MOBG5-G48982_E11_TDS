<?php

namespace App\Models;

use App\Http\Controllers\RepositoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Repository extends Model
{
    use HasFactory;




    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function contributor(): BelongsTo
    {
        return $this->belongsTo(Contributor::class,'contributor_login','login');
    }

    //https://stackoverflow.com/questions/43284145/laravel-how-to-chain-eloquent-relationship-eager-loading
    public function commits(): HasMany
    {
        return $this->hasMany(Commit::class);
    }

    public static function getReposInfo()
    {
       return  DB::select ('select r.id as id, r.name as reponame ,cb.name as c_name,COUNT(c.id)as commits from repositories r left join commits c on r.id=c.repository_id join contributors cb on cb.login=r.contributor_login group by r.id, r.name,cb.name');
    }

    public static function repoDetailById($repo)
    {

       $repo_name= DB::select('SELECT r.name as repo_name from repositories r LEft JOIN contributors c on r.contributor_login= c.login where r.id= ?',[$repo]);
       $user_name= DB::select('SELECT c.name as c_name from repositories r LEft JOIN contributors c on r.contributor_login= c.login where r.id= ?',[$repo]);
       $commits=DB::select('select c.date as ladate,c.message as message from repositories r LEFT JOIN commits c  on r.id= c.repository_id where r.id=?',[$repo]);
       $result['repo_name']=$repo_name;
       $result['user_name']=$user_name;
       $result['commits']=$commits;

        $result = array('repo_name' => $repo_name,'user_name' => $user_name, 'commits'=>$commits); //init
        return $result;
    }




}
