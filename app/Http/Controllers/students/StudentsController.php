<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\School;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students =Student::all();
        $schools =School::all();
        return view('students.index', compact('schools','students'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'school_id' => 'required',
            'gender' => 'required',
            'dob' => 'required',
        ]);
        $name= $request->get("name");
        Student::create($request->all());
        return back()->with("success", "$name has been created successfully");
    }
}
