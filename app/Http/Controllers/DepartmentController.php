<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Faculty;
use App\AcademicDepartment;
use App\Student;
use App\Department;
use App\Clearance;

class DepartmentController extends Controller
{
    

    public function index()
    {
        $user = auth()->user();
        $incharge = $user->inchargeOf;

        if($incharge->officeable_type=="App\Faculty"){

            $faculty_name = Faculty::find($incharge->officeable_id)->name;
            $department_title = 'Faculty - '. $faculty_name;

        }else if($incharge->officeable_type=="App\AcademicDepartment"){
            $department_name = AcademicDepartment::find($incharge->officeable_id)->name;
            $department_title = 'Department - '. $department_name;

          
        }else if($incharge->officeable_type=="App\Department"){
            $department_name = Department::find($incharge->officeable_id)->name;
            $department_title = 'Department - '. $department_name;

           
        }

        $clearances =Clearance::with('student')
                    ->where('departmentable_type',$incharge->officeable_type)
                    ->where('departmentable_id',$incharge->officeable_id)
                    ->orderBy('updated_at')
                    ->get();
        return view('departments.index', compact('clearances','department_title'));
    }

    public function reports()
    {
       
    }
}
