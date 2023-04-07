<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <div class="col-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="/login" method="post">
                            @csrf
                            <div class="text-center mb-3">
                                <h1>Login</h1>
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" >
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" >
                            </div>
                            <div class="my-3">
                                <button class="btn btn-primary w-100">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>