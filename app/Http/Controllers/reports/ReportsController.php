<?php

namespace App\Http\Controllers\reports;

use App\Book;
use App\Http\Controllers\Controller;
use App\ItemRequest;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function mostRequested()
    {
       $requests = ItemRequest::where(['status'=>'pending'])->get();
       return view('reports.book_requests', compact('requests'));
    }

    public function markAsSourced($id)
    {
        $item=ItemRequest::find($id);
        if ($item){
            $item->status ="Sourced";
            $item->save();
        }
        return back()->with("success", "Item has been updated successfully");
    }

    public function bookRequests()
    {
       $books=Book::with('transactions')->get();
       return view('reports.books', compact('books'));
    }
}
