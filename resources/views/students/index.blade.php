@extends('base_templates.core')

@section('content')

    <div class="container">
        <div class="row">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               CREATE STUDENT
            </button>
{{--            Modal Start--}}

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Student</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Add Student</h6>
                                    </div>
                                    <div class="card-body">
                                        {{--                        "school_id","name","gender","dob"--}}
                                        <form action="{{route('students-store')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="school">School</label>
                                                <select name="school_id" id="school" class="form-control">
                                                    @foreach($schools as $school)
                                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="names">Full Name</label>
                                                <input type="text"  id="names" class="form-control" name="name" placeholder="Full Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date"  id="dob" class="form-control" name="dob" placeholder="Date of birth" required>
                                            </div>

                                            <label>Gender</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" value="Male">Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" value="Female">Female
                                                </label>
                                            </div>

                                            <button class="btn btn-info btn-block btnsm">Save Student</button>
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


{{--            Modal End--}}


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
                        <th>Name</th>
                        <th>Gender</th>
                        <th>School</th>
                        <th>DOB</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    "school_id","name","gender","dob"--}}
                    @foreach($students as $student)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->school->name}}</td>
                            <td>{{$student->dob->format('d-m-Y')}}</td>
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
