<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Faculty;
use App\Course;
use App\AcademicDepartment;
use App\Student;
use App\Department;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['getDepartments']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $student = Student::where('user_id', auth()->user()->id)->first();
        if($student == null){
            return redirect()->route('profile');
        }

        $departments = Department::all();


        return view('home', compact('departments'));
    }


    public function profile()
    {
        $faculties = Faculty::all();
        return view('profile', compact('faculties'));
    }

    public function getDepartments($id)
    {
        $faculty = Faculty::find($id);
        $departments = $faculty->departments;
        return $departments;
    }


    public function getCourses($id)
    {
        $courses = Course::where('department_id', $id)->get();
        return $courses;
    }


    public function saveProfile(Request $request)
    {

        Student::create([
            'user_id'=>auth()->user()->id,
            'regno'=>auth()->user()->regno,
            'course'=>$request->course,
            'faculty_id'=> $request->faculty,
            'department_id'=>$request->department
        ]);

        return redirect()->route('home')->withMessage('Student Profile updated');

    }
}
