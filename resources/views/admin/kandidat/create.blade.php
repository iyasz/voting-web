@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-10">
                <a href="/kandidat" class="btn btn-primary mb-3">Back</a>
                <div class="card mb-5">
                    <div class="card-body">
                        <h1 class="mt-2 mb-3">Form Kandidat</h1>
                        <form action="/kandidat" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Nama</label>
                                <select name="user_id" class="form-select" required>
                                    <option disabled selected>Select On Option ...</option>
                                    @foreach ($student as $data)
                                        <option value="{{$data->id}}">{{$data->name}} - {{$data->classroom->name}} - {{$data->jurusan->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')<p class="mb-0 text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Visi</label>
                                <input type="text" name="visi" value="{{old('visi')}}" required class="form-control @error('visi') is-invalid @enderror">
                                @error('visi')<p class="mb-0 text-danger">{{$message}}</p>@enderror
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
