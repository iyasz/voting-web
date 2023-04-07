<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\classroom;
use App\Models\jurusan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuent = User::where('role_id', 2)->get();
        return view('admin.student.index', ['student' => $stuent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = classroom::all();
        $jurusan = jurusan::all();
        return view('admin.student.create', ['classroom' => $class, 'jurusan' => $jurusan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'nis' => 'required|unique:users',
            'password' => 'required',
            'classroom_id' => 'required',
            'jurusan_id' => 'required',
        ],[
            'classroom_id.required' => 'Kelas Harus Di isi!',
            'jurusan_id.required' => 'Kelas Harus Di isi!',
        ]);


        $request['status_vote'] = 1;
        $request['role_id'] = 2;
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 10]);
        User::create($request->except('_token'));

        return redirect('/student')->with('success', 'Data Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = User::find($id);
        $class = classroom::all();
        $jurusan = jurusan::all();
        return view('admin.student.edit', ['student' => $student, 'classroom' => $class, 'jurusan' => $jurusan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $student = User::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'username' => 'required|unique:users,username,' . $student->id,
            'nis' => 'required|unique:users,nis,' . $student->id,
            'classroom_id' => 'required',
            'jurusan_id' => 'required',
        ],[
            'classroom_id.required' => 'Kelas Harus Di isi!',
            'jurusan_id.required' => 'Kelas Harus Di isi!',
        ]);

        $request['updated_at'] = Carbon::now();
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 10]);
        $student->update($request->except('_token'));

        return redirect('/student')->with('success', 'Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = User::findOrFail($id);
        $student->delete();
        return redirect('/student')->with('success', 'Data Berhasil Di hapus!');
    }
}
