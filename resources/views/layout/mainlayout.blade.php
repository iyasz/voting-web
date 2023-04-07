<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg shadow-sm py-3">
        <div class="container">
            <a href="" class="navbar-brand">E Voting</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @if(Auth::user()->role_id == 1)
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="/app" class="nav-link mx-3">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin" class="nav-link mx-3">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="/student" class="nav-link mx-3">Student</a>
                    </li>
                    <li class="nav-item">
                        <a href="/kandidat" class="nav-link mx-3">Kandidat</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_id == 2)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/vote" class="nav-link">Vote</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>