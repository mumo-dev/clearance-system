<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clearance;
use App\Faculty;
use App\AcademicDepartment;
use App\Department;

class ClearanceController extends Controller
{
   public function checkFacultyStatus($id)
   {
       $clearance = Clearance::where('student_id', auth()->user()->id)
                              ->where('departmentable_type', 'App\Faculty')
                              ->where('departmentable_id', $id)
                              ->first();

        if($clearance == null){
            return response()->json([
                'message'=>'Not Found'
            ]);
        }

        return response()->json([
            'message'=>'Found',
            'clearance'=>$clearance 
        ]);

   }

   public function checkDepartmentStatus(Request $request,$id)
   {
        //departmentable_type 	departmentable_id
    
        $type = $request->query('academic')== 'true' ? 'App\AcademicDepartment': 'Department';
        $clearance = Clearance::where('student_id', auth()->user()->id)
                              ->where('departmentable_type', $type)
                              ->where('departmentable_id', $id)
                              ->first();

        if($clearance == null){
            return response()->json([
                'message'=>'Not Found'
            ]);
        }

        return response()->json([
            'message'=>'Found',
            'clearance'=>$clearance 
        ]);

   }

   public function updateFacultyClearance($id)
   {
       $faculty = Faculty::find($id);
       $clearance = $faculty->clearances()->create([
           'student_id'=>auth()->user()->id,
           'status'=>'pending'
       ]);

       return response()->json([
            'message'=>'success',
            'clearance'=>$clearance 
        ]);
       
   }

   public function updateDepartmentClearance(Request $request, $id)
   {

       if($request->query('academic')== 'true'){
            $department = AcademicDepartment::find($id);
       }else {
        $department = Department::find($id);
       }

       $clearance = $department->clearances()->create([
            'student_id'=>auth()->user()->id,
            'status'=>'pending'
        ]);

        return response()->json([
            'message'=>'success',
            'clearance'=>$clearance 
        ]);

   }
}
