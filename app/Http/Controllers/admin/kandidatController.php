<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kandidat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class kandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = kandidat::all();
        return view('admin.kandidat.index', ['kandidat' => $kandidat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = User::where('role_id', 2)->get();
        return view('admin.kandidat.create', ["student" => $student]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'visi' => 'required',
        ],[
            'user_id.required' => 'Student Harus Di isi!',
            'visi.required' => 'Visi Harus Di isi!',
        ]);

        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $request['jumlah_suara'] = 0;
        kandidat::create($request->except('_token'));
        return redirect('/kandidat')->with('success', 'Data Berhasil Dibuat!');
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

        $kandidat = kandidat::find($id);
        $studentAll = User::where('role_id', 2)->get();
        return view('admin.kandidat.edit', ["kandidat" => $kandidat, 'studentAll' => $studentAll]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'visi' => 'required',
        ],[
            'user_id.required' => 'Student Harus Di isi!',
            'visi.required' => 'Visi Harus Di isi!',
        ]);

        $kandidat = kandidat::find($id);
        $request['updated_at'] = Carbon::now();
        $kandidat->update($request->except('_token'));
        return redirect('/kandidat')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kandidat = kandidat::find($id);
        $kandidat->delete();
        return redirect('/kandidat')->with('success', 'Data Berhasil Dihapus!');
    }
}
