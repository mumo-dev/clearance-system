<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Faculty;
use App\AcademicDepartment;

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
        return view('home');
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
}
