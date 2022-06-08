
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

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
                    <form method="POST" action="{{ route('registarion') }}">
                        @csrf
                        <label for="name">Name :</label>
                        <input type="text" placeholder="Name" id="name" name="name" autocomplete="off"><br>
                        <label for="emai">Email :</label>
                        <input type="text" placeholder="Email" id="email" name="email" autocomplete="off"><br>
                        <label for="password">Password :</label>
                        <input type="password" placeholder="Password" name="password" autocomplete="off"><br>
                        @if($errors)
                            {{ $errors }}
                        @endif
                        <button type="submit" value="Register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>