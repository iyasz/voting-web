<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role_id', 1)->get();
        return view('admin.admin.index', ['admin' => $admin]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
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
            'password' => 'required',
        ]);


        $request['role_id'] = 1;
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 10]);
        User::create($request->except('_token'));

        return redirect('/admin')->with('success', 'Data Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::find($id);
        
        return view('admin.admin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::find($id);

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'username' => 'required|unique:users,username,' . $admin->id,
        ]);

        $request['status_vote'] = 0;
        $request['updated_at'] = Carbon::now();
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 10]);
        $admin->update($request->except('_token'));

        return redirect('/admin')->with('success', 'Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect('/admin')->with('success', 'Data Berhasil Di hapus!');
    }
}
