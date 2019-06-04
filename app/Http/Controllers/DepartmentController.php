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

        //

        $clearances =Clearance::with('student')
                    ->where('departmentable_type',$incharge->officeable_type)
                    ->where('departmentable_id',$incharge->officeable_id)
                    ->where('status', '!=', 'Cleared')
                    ->orderBy('updated_at')
                    ->get();


        return view('departments.index', compact('clearances','department_title'));
    }

    public function reports()
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

        $reports = Clearance::with(['student','clearedBy'])
                            ->where("departmentable_type",$incharge->officeable_type)
                            ->where("departmentable_id", $incharge->officeable_id)
                            ->get();


                        
        // return ;
        return view('departments.report', compact('reports','department_title'));
    }

    public function clearStudent($id)
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

        $clearance = Clearance::with('student')->findOrFail($id);
        if($clearance->departmentable_type == $incharge->officeable_type  && 
            $clearance->departmentable_id == $incharge->officeable_id ){

            return view('departments.clear', compact('clearance', 'department_title'));
        }else {
            \abort(404);
        }
    }


    public function updateClearanceStatus(Request $request)
    {
        $id = $request->id;
        $cleared = $request->status;
        $remarks = $request->remarks;

        if($cleared == 'notclear' && $remarks==null){
            return redirect()->back()->withMessage('Please comment why you have not cleared the student ');
        }

        $status = $cleared == 'notclear'? 'Not Cleared':'Cleared';

        $clearance = Clearance::findOrFail($id);
        $clearance->status = $status;
        $clearance->clearance_officer_id = auth()->user()->inchargeOf->id;
        $clearance->remarks = trim($remarks);
        $clearance->save();

        return redirect()->route('department.home')->withMessage('Student clearance status updated successfully ');
    }
}
