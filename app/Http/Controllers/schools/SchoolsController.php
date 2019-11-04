<?php

namespace App\Http\Controllers\schools;

use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $name = $request->get("name");
        School::create(["name" => $name]);
        return back()->with("success", "$name has been created successfully");
    }
}
