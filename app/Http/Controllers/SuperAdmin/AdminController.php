<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = Admin::where('nama', 'like', '%' . $query . '%')->get();
        return view('superAdmin.akun.index', compact('data'));
    }
    public function create()
    {
        return view('superAdmin.akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:admins,username',
            'password' => 'required|min:8',
            'roles' => 'required'
        ], [
            'min' => ':attribute Minimal 8 karakter',
            'required' => ':attribute Wajib diisi',

        ]);
        // return dd($request->all());
        Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'roles' => $request->roles
        ]);

        return redirect()->route('user.data')->with('success', 'Data berhasil ditambahkan');
    }
}
