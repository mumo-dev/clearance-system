<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Faculty;

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
}
