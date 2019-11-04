@extends('base_templates.core')

@section('content')

    <div class="container">
        <div class="row">




            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                ADD ACTIVITY(S)
            </button>
            {{--            Modal Start--}}

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">New Activity</h4>
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
                                        <form action="{{route('activities-store')}}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Activity Title" required>
                                            </div>

                                            <button class="btn btn-sm btn-primary">Save Activity</button>
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
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{Session::get('success')}}
                    </div>
                @endif


                    <table class="table table-dark table-striped" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$activity->name}}</td>
                                <td>{{$activity->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

    </div>

@endsection
