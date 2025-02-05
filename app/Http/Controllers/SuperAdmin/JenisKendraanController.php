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

        $data = JenisKendaraan::withTrashed('deleted_at') // Menampilkan semua data, termasuk yang dihapus
            ->when(!empty($query), function ($q) use ($query) {
                $q->orWhere('nama', 'like', '%' . $query . '%');
            })
            ->get();

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
    // public function updateStatus(Request $request, $id){
    //     $data = JenisKendaraan::find($id);
    //     $data->update(['status' => $request->status]);

    //     return redirect()->back()->with('status', 'Delete Success');
    // }

    public function edit($id) //digunakan untuk edit data jenis kendaran
    {
        $data = JenisKendaraan::find($id);
        // return dd($data);
        return view('superAdmin.jeniskendaraan.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ], [

            'required' => 'Jenis Kendaraan Wajib diisi',


        ]);
        $data = JenisKendaraan::findOrFail($id);

        //update hanya atribut yang diperbolehkan
        $updateData = [
            'nama' => $request->nama
        ];

        $data->update($updateData);
        return redirect()->route('jeniskendaraan.data')->with('status', 'Berhasil diupdate');
    }



    // public function delete($id) // digunakan untuk menghapus data jenisk kendraan
    // {
    //     $data = JenisKendaraan::find($id);
    //     $data->delete();

    //     return redirect()->back()->with('status', 'Delete berhasil');
    // }

    // penggunaan soft delete


    public function delete(Request $request, $id)
    {
        $datadelet = JenisKendaraan::find($id);

        if (!$datadelet) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
        // $admin->update(['status' => $request->status]);
        $datadelet->delete(); // Melakukan Soft Delete

        return redirect()->back()->with('success', 'Jenis Kendaraan berhasil dihapus.');
    }

    // untuk resrto yang sudah di soft delete
    public function restore($id)
    {
        $datadelete = JenisKendaraan::withTrashed()->find($id);

        if (!$datadelete) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $datadelete->restore();
        // $datadelete->forceDelete() digunakan untuk delete permanen
        return redirect()->back()->with('success', 'User berhasil dikembalikan.');
    }
}
