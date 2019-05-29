<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Faculty;
use App\Department;
use App\AcademicDepartment;
use App\User;
use App\ClearanceOfficer;


class AccountsController extends Controller
{
    public function index()
    {
        $accounts = ClearanceOfficer::with('user')->get();
        $accounts = $accounts->map(function($account){
            if($account->officeable_type == 'App\Faculty'){
                $fac = Faculty::find($account->officeable_id);
                $account['department'] = 'Faculty - '. $fac->name;
            }else if($account->officeable_type == 'App\AcademicDepartment'){
                $fac = AcademicDepartment::find($account->officeable_id);
                $account['department'] = 'Department - '. $fac->name;
            }else {
                $fac = Department::find($account->officeable_id);
                $account['department'] = 'Department - '. $fac->name;
            }

            return $account;
        });

        return view('admin.accounts', compact('accounts'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $academicDepartments = AcademicDepartment::all();
        $nonAcademicdepartments = Department::all();
        return view('admin.accounts-create',compact('faculties','academicDepartments','nonAcademicdepartments'));
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

    public function storeAccount(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $department_choice = $request->department_choice;
        $faculty = $request->faculty;
        $academicdepartment = $request->academicdepartment;
        $department = $request->department;

        if($password != $password_confirmation){
            return redirect()->back()->withMessage('Password fields must much');
        }

        if($department_choice=='faculty'){
            if($faculty == ''){
                return redirect()->back()->withMessage('Please choose faculty');
            }else {

                $user = User::create([
                    'name'=>$name,
                    'email'=>$email,
                    'password' => Hash::make($password),
                    'user_type'=>1
                ]);

                $dofficer = Faculty::find($faculty);

                $dofficer->officers()->create([
                    'user_id'=> $user->id
                ]);

                return redirect()->route('admin.accounts')->withMessage('Account created successfully');
            }
        }

        if($department_choice=='academicdepartment'){
            if($academicdepartment == ''){
                return redirect()->back()->withMessage('Please choose department ');
            }else {

                $user = User::create([
                    'name'=>$name,
                    'email'=>$email,
                    'password' => Hash::make($password),
                    'user_type'=>1
                ]);

                $dofficer = AcademicDepartment::find($academicdepartment);

                $dofficer->officers()->create([
                    'user_id'=> $user->id
                ]);

                return redirect()->route('admin.accounts')->withMessage('Account created successfully');


            }
        }

        if($department_choice=='department'){
            if($department == ''){
                return redirect()->back()->withMessage('Please choose department ');
            }else {
                $user = User::create([
                    'name'=>$name,
                    'email'=>$email,
                    'password' => Hash::make($password),
                    'user_type'=>1
                ]);

                $dofficer = Department::find($department);

                $dofficer->officers()->create([
                    'user_id'=> $user->id
                ]);

                return redirect()->route('admin.accounts')->withMessage('Account created successfully');
            }
        }
    }


}
