@extends('base_templates.core')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <h3>Most Requested Items Reports</h3>
         <table class="table table-dark table-stripped" id="example">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Request Title</th>
                  <th>Number Of Requests</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
                     @foreach($requests as $item)
                        <tr>
                           <td>{{$item->id}}</td>
                           <td>{{$item->title}}</td>
                           <td>{{$item->total_requests}}</td>
                           <td>{{ucwords($item->status)}}</td>
                           <td>
                              @if($item->status=="pending")
                                 <a href="{{route('mark-as-sourced', [$item->id])}}" class="btn btn-info btn-sm">Sourced</a>
                              @endif
                           </td>
                        </tr>
                     @endforeach
            </tbody>
         </table>
      </div>
   </div>
@endsection
