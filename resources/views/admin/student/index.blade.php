@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-10">
                <div class="text-end">
                    <a href="/student/create" class="btn btn-primary">Create</a>
                </div>
                @if(SESSION('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{SESSION('success')}}
                  </div>
                @endif
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($student as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->classroom->name}}</td>
                                <td>{{$data->jurusan->name}}</td>
                                <td>
                                    <a href="/student/{{$data->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="/student/{{$data->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data {{$data->name}} ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
