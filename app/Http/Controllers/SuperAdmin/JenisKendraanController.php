<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendraanController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = JenisKendaraan::where('nama', 'like', '%' . $query . '%')->get();
        return view('superAdmin.jeniskendaraan.index', compact('data'));
    }

    public function create()
    {
        return view('superAdmin.jeniskendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:jenis_kendaraans,nama'
        ], [
            'required' => ':attribute Wajib diisi'
        ]);

        // return dd($request->all());
        JenisKendaraan::create([
            'nama' => $request->nama
        ]);
        return redirect()->route('jeniskendaraan.data')->with('success', 'Data berhasil ditambahkan');
    }
    public function updateStatus(Request $request, $id){
        $data = JenisKendaraan::find($id);
        $data->update(['status' => $request->status]);

        return redirect()->back()->with('status', 'Delete Success');
    }
}
