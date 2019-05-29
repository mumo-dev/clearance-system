<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Faculty;
use App\Department;
use App\AcademicDepartment;

class AccountsController extends Controller
{
    public function index()
    {
        return view('admin.accounts');
    }

    public function create()
    {
        return view('admin.accounts-create');
    }


    public function faculty()
    {
        $faculties = Faculty::all();
        return view('admin.faculty', compact('faculties'));
    }

    public function addFaculty(Request $request)
    {
        $faculty = Faculty::create([
            'name'=>$request->name
        ]);

        return redirect()->back()->withMessage('Faculty added successfully');
    }

    public function department()
    {
        $academicDepartments = AcademicDepartment::all();
        $departments = Department::all();
        return view('admin.department', compact('academicDepartments','departments'));
    }


    public function addDepartment()
    {
        $faculties = Faculty::all();
        return view('admin.department-create', compact('faculties'));
    }

    public function storeDepartment(Request $request)
    {
        $name = $request->name;
        $is_academic = $request->is_academic;
        $faculty = $request->faculty;
      
        if($is_academic == 'academic' && $faculty == ''){
            return redirect()->back()->withMessage('Please choose faculty field');
        }

        if($is_academic == 'academic'){
            AcademicDepartment::create([
                'name' => $name,
                'faculty_id'=>$faculty
            ]);
        }else {
            Department::create([
                'name' => $name,
                'faculty_id'=>$faculty
            ]);
        }

        return redirect()->route('admin.department')->withMessage('Department successfully added');
       
    }


}
