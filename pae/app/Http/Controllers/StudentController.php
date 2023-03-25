<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students=DB::select('select s.id as matricule,s.name as nom,SUM(c.credits) as total from students s left join programs p on p.student_id=s.id left join courses c on p.course_id=c.id group by s.id,s.name');
        //return response()->json(new StudentCollection(Student::all()),Response::HTTP_OK);
        return response()->json([
            'data' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   // public function show(Student $student)
    public function show( $student)
    {
        $courses=Student::studentProgramByid($student);
        return response()->json([
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Student $student)
    public function destroy($studentId,$studentCourse)
    {
        $deleted = DB::delete('delete from programs where student_id =? and course_id =?',
        [$studentId,$studentCourse]
        );
        return $deleted;
    }

    public function getAllStudents()
    {
        $allStudents = Student::allStudents();
        return view('students', [
            'allStudents' => $allStudents
        ]);

    }
}
