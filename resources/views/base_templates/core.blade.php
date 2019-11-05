<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library Manager</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Library Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto mr-4" >
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    New Item
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('students')}}">Student</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('books')}}">Books</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('schools')}}">Schools</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('activities')}}">Activities</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('transactions')}}">Catalogue</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                   Reports
                </a>
                <div class="dropdown-menu dropdown-menu-left">
                    <a class="dropdown-item" href="{{route('book-requests')}}">Text Books Request</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('most-requested')}}">Most Requested Books</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<br>

@yield('content')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
{{--https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js--}}
</body>
</html>


