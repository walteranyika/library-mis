@extends('base_templates.core')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header"><h4>ADD ACTIVITY</h4></div>
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">
                            ISSUE BOOK
                        </button>

                        <br>

                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal2">
                            OTHER ACTIVITIES
                        </button>
                        <br>

                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal3">
                            CREATE REQUEST
                        </button>


                        <br>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{Session::get('success')}}
                            </div>
                        @endif

                    </div>
                </div>

            </div>





            {{--            Modal Start--}}

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">NEW TRANSACTIONS</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Add Activity</h6>
                                    </div>
                                    <div class="card-body">
                                        {{--                        "title", "author", "year", "isbn"--}}
                                        <form action="{{route('transactions-store')}}" method="post">
                                            @csrf

                                             <div class="form-group">

                                                 <label for="student">Student</label>
                                                 <select name="student_id" id="student" class="form-control">
                                                     @foreach($students as $student)
                                                         <option value="{{$student->id}}">{{$student->name}}</option>
                                                     @endforeach
                                                 </select>
                                             </div>

                                            <div class="form-group">
                                                <label for="activity">Activity</label>
                                                <select name="activity_id" id="activity" class="form-control">
                                                    @foreach($activities as $activity)
                                                        <option value="{{$activity->id}}">{{$activity->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label for="book">Book</label>
                                                <select name="book_id" id="book" class="form-control">
                                                    @foreach($books as $book)
                                                        <option value="{{$book->id}}">{{$book->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>






                                            <button class="btn btn-sm btn-primary">Save Transaction</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            {{--                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">NON READING ACTIVITIES</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Add Activity</h6>
                                    </div>
                                    <div class="card-body">
                                        {{--                        "title", "author", "year", "isbn"--}}
                                        <form action="{{route('transactions-store')}}" method="post">
                                            @csrf

                                            <div class="form-group">

                                                <label for="student">Student</label>
                                                <select name="student_id" id="student" class="form-control">
                                                    @foreach($students as $student)
                                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="activity">Activity</label>
                                                <select name="activity_id" id="activity" class="form-control">
                                                    @foreach($activities as $activity)
                                                        <option value="{{$activity->id}}">{{$activity->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <button class="btn btn-sm btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            {{--                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal" id="myModal3">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">CREATE A BOOK REQUEST</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">CREATE A REQUEST</h6>
                                    </div>
                                    <div class="card-body">
                                        {{--                        "title", "author", "year", "isbn"--}}
                                        <form action="{{route('requests-store')}}" method="post">
                                            @csrf


                                            <div class="form-group">
                                                <label for="activity">Item Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Title of The Book/Item">
                                            </div>


                                            <button class="btn btn-sm btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            {{--                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <br>
        {{--     End of the form--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-sm-12">--}}
{{--                @if(Session::has('success'))--}}
{{--                    <div class="alert alert-success">--}}
{{--                        <strong>Success!</strong> {{Session::get('success')}}--}}
{{--                    </div>--}}
{{--                @endif--}}


{{--                <table class="table table-dark table-striped" id="table">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>#</th>--}}
{{--                        <th>Title</th>--}}
{{--                        <th>Created</th>--}}
{{--                        <th>Action</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($activities as $activity)--}}
{{--                        <tr>--}}
{{--                            <td>{{$loop->iteration}}</td>--}}
{{--                            <td>{{$activity->name}}</td>--}}
{{--                            <td>{{$activity->created_at->format('d-m-Y')}}</td>--}}
{{--                            <td>--}}
{{--                                <a href="#" class="btn btn-danger btn-sm">Delete</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

@endsection
