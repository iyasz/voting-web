@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-10">
                <a href="/student" class="btn btn-primary mb-3">Back</a>
                <div class="card mb-5">
                    <div class="card-body">
                        <h1 class="mt-2 mb-3">Form Student</h1>
                        <form action="/student" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="name" value="{{old('name')}}" required class="form-control @error('name') is-invalid @enderror">
                                @error('name')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" value="{{old('email')}}" name="email" required class="form-control @error('email') is-invalid @enderror">
                                @error('email')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" value="{{old('username')}}" required class="form-control @error('username') is-invalid @enderror">
                                @error('username')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" required value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                                @error('password')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>NIS</label>
                                <input type="number" name="nis" required value="{{old('nis')}}" class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Kelas</label>
                                <select required name="classroom_id" class="form-select @error('classroom_id') is-invalid @enderror">
                                    <option selected disabled>Choose One Option</option>
                                    @foreach ($classroom as $data)
                                        <option @if(old('classroom_id') == $data->id) selected @endif value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('classroom_id')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Jurusan</label>
                                <select required name="jurusan_id" class="form-select @error('jurusan_id') is-invalid @enderror">
                                    <option selected disabled>Choose One Option</option>
                                    @foreach ($jurusan as $data)
                                        <option @if(old('jurusan_id') == $data->id) selected @endif value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')<p class="mb-0 text-danger">{{$message}}</p>@enderror
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
