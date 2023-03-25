<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    public function courses() : BelongsToMany{
        return $this->belongsToMany(Course::class);
    }

    public static function studentProgramByid($id){
        return DB::select('select c.id,c.title,c.credits from students s left join programs p on p.student_id=s.id left join courses c on p.course_id=c.id where s.id = ?', [$id]);
    }

    public static function allStudents()
    {
        $students=DB::select('select s.id as matricule,s.name as nom,SUM(c.credits) as total from students s left join programs p on p.student_id=s.id left join courses c on p.course_id=c.id group by s.id,s.name');
        return $students;
    }
}
