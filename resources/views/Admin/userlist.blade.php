


<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/admin.css" rel="stylesheet" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard') }}">Dashboard</a> |
                    <a href="{{ route('userreg') }}">User Registration</a> |
                    <a href="{{ route('userslist') }}">Users List</a> |
                </div>

                <div class="card-body">
                    <table id="list">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Resume link</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->resume_link)
                            <td><a href ='{{ $user->resume_link }}' target="__blank">View</a></td>
                            @endif
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

