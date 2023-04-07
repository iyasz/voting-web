@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-10">
                <a href="/admin" class="btn btn-primary mb-3">Back</a>
                <div class="card mb-5">
                    <div class="card-body">
                        <h1 class="mt-2 mb-3">Form Admin</h1>
                        <form action="/admin" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="name" value="{{old('name')}}" required class="form-control @error('name') is-invalid @enderror">
                                @error('name')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="{{old('email')}}" required class="form-control @error('email') is-invalid @enderror">
                                @error('email')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" value="{{old('username')}}" required class="form-control @error('username') is-invalid @enderror">
                                @error('username')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" value="{{old('password')}}" required class="form-control @error('password') is-invalid @enderror">
                                @error('password')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
