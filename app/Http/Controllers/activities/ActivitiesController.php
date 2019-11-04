<?php

namespace App\Http\Controllers\activities;

use App\Activity;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities=Activity::all();
        return view('activities.index',compact('activities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $title= $request->get("name");
        Activity::create($request->all());
        return back()->with("success", "$title has been created successfully");
    }
}
