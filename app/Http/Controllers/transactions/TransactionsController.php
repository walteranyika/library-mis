<?php

namespace App\Http\Controllers\transactions;

use App\Activity;
use App\Book;
use App\Http\Controllers\Controller;
use App\ItemRequest;
use App\Student;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $activities= Activity::all();
        $books= Book::all();
        return view('transactions.index', compact('activities','students','books'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'activity_id' => 'required|exists:activities,id',
            'book_id' => 'required|exists:books,id',
        ]);
        Transaction::create($request->all());
        $activity= Activity::find($request->activity_id);
        $activity->total_requests +=1;
        $activity->save();
        return back()->with('success','Records Updated');
    }

    public function storeRequests(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
        ]);
        $title = $request->title;

        $item = ItemRequest::where('title','like', '%'.$title.'%')->first();
        if ($item){
            $item->total_requests +=1;
            $item->save();
        }else{
            ItemRequest::create(["title"=>$title,"total_requests"=>1]);
        }
        return back()->with('success','Records have been updated successfully');
    }
}
