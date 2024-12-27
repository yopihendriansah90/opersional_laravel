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

        // $data = Admin::where('status', 'on')->orWhere('nama', 'like', '%' . $query . '%')->get();
        $data = Admin::where('status', 'on')
            ->when(!empty($query), function ($q) use ($query) {
                $q->orWhere('nama', 'like', '%' . $query . '%');
            })
            ->get();
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

    // update status jadi off
    public function updateStatus(Request $request, $id){
        $data = Admin::find($id);
        $data->update(['status' => $request->status]);

        return redirect()->back()->with('status', 'Delete Success');
    }
}
