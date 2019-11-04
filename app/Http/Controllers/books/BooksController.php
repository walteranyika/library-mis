<?php

namespace App\Http\Controllers\books;

use App\Book;
use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $schools= School::all();
        $books = Book::all();
        return view('books.index', compact('schools','books'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $title= $request->get("name");
        Book::create($request->all());
        return back()->with("success", "$title has been created successfully");
    }
}
