<?php

namespace App\Http\Controllers\reports;

use App\Book;
use App\Http\Controllers\Controller;
use App\ItemRequest;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function activities_by_day()
    {
        $activities = DB::table('transactions')
            ->select(DB::raw('DATE(created_at) as date_created'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        return view('reports.activities_day', compact('activities'));
    }

    public function activities_by_month()
    {
        $activities = DB::table('transactions')
            ->select(DB::raw('MONTHNAME(created_at) as date_created'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('MONTHNAME(created_at)'))
            ->get();
        return view('reports.activities_month', compact('activities'));
    }
}
