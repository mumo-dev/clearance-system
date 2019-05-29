<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Faculty;
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


    public function saveProfile(Request $request)
    {
        $this->validate($request,[
            'regno'=>'required|string|regex:/^([A-Z])+([0-9])+\/([0-9]){5}\/([0-9]){2}$/i'
        ]);

        Student::create([
            'user_id'=>auth()->user()->id,
            'regno'=>$request->regno,
            'course'=>$request->course,
            'faculty_id'=> $request->faculty,
            'department_id'=>$request->department
        ]);

        return redirect()->route('home')->withMessage('Student Profile updated');

    }
}
