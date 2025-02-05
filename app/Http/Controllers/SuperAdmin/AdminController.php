<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        // awal modifikasi soft delete


        $query = $request->input('query');

        // $data = Admin::whereNull('deleted_at') // Menampilkan semua data, termasuk yang dihapus
        $data = Admin::withTrashed('deleted_at') // Menampilkan semua data, termasuk yang dihapus
            ->when(!empty($query), function ($q) use ($query) {
                $q->orWhere('nama', 'like', '%' . $query . '%');
            })
            ->get();

        // akhir dari modifikasi soft delete



        // // $data = Admin::where('status', 'on')->orWhere('nama', 'like', '%' . $query . '%')->get();
        // $data = Admin::where('status', 'on')
        //     ->when(!empty($query), function ($q) use ($query) {
        //         $q->orWhere('nama', 'like', '%' . $query . '%');
        //     })
        //     ->get();
        return view('superAdmin.akun.index', compact('data'));
    }

    // controler view
    public function show($id)
    {
        $data = Admin::find($id);
        return view('superAdmin.akun.show', compact('data'));
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
    //untuk mengirimkan data dari index ke fomr endswitch
    public function edit($id)
    {
        $data = Admin::find($id);
        // return dd($data);
        return view('superAdmin.akun.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:admins,username,' . $id,
            'password' => 'nullable|min:8',
            'konfir' => 'nullable|same:password',
            'roles' => 'required'
        ], [
            'min' => ':attribute Minimal 8 karakter',
            'required' => ':attribute Wajib diisi',
            'same' => 'Konfirmasi password tidak sama dengan password',

        ]);
        $data = Admin::findOrFail($id);

        //update hanya atribut yang diperbolehkan
        $updatData = [
            'nama' => $request->nama,
            'username' => $request->username,
            'roles' => $request->roles,
        ];

        // periksa jika password diisi, hash dan tambahkan ke data yang akan di update
        if ($request->filled('password')) {
            $updatData['password'] = bcrypt($request->password);
        }
        $data->update($updatData);
        return redirect()->route('user.data')->with('status', 'Berhasil diupdate');
    }

    // update status jadi off di buat untuk update
    // public function updateStatus(Request $request, $id)
    // {
    //     $data = Admin::find($id);
    //     $data->update(['status' => $request->status]);

    //     return redirect()->back()->with('status', 'Delete Success');
    // }



    // penggunaan soft delete
    public function updateStatus(Request $request, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
        // $admin->update(['status' => $request->status]);
        $admin->delete(); // Melakukan Soft Delete

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    // untuk resrto yang sudah di soft delete
    public function restore($id)
    {
        $admin = Admin::withTrashed()->find($id);

        if (!$admin) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $admin->restore();

        return redirect()->back()->with('success', 'User berhasil dikembalikan.');
    }
}
