@extends('base_templates.core')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Books Requests Report</h3>
            <table class="table table-dark table-stripped" id="example">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Requests</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->quantity}}</td>
                        @if($book->transactions)
                           <td>{{$book->transactions->count()}}</td>
                        @else
                            <td>0</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
