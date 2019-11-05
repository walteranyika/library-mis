@extends('base_templates.core')

@section('content')

    <div class="container">
        <div class="row">



            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                ADD SCHOOL
            </button>
            {{--            Modal Start--}}

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add New School</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Add An Institution</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('school-store')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Institution Name">
                                            </div>
                                            <button class="btn btn-sm btn-primary">Add</button>
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

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li  class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <table class="table table-dark table-striped" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date Added</th>
                            <th>Students</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schools as $school)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$school->name}}</td>
                                <td>{{$school->created_at->format('d-m-Y')}}</td>
                                <td>{{$school->students->count()}}</td>
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
