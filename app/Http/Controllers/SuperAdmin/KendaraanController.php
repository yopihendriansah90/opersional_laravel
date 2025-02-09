<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisKendaraan;
use Illuminate\Validation\Rule;

class KendaraanController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = Kendaraan::with('jenisKendaraan')->where('no_polisi', 'like', '%' . $query . '%')->get();

        return view('superAdmin.kendaraan.index', compact('data'));
    }

    public function create()
    {
        $jeniskendaraan = JenisKendaraan::where('status', 'on')->get();
        return view('superAdmin.kendaraan.create', compact('jeniskendaraan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pintu' => 'nullable',
            'id_jenis_kendaraan' => 'required',
            'no_polisi' => 'required|unique:kendaraans,no_polisi',
            'warna_kendaraan' => 'required',
            'warna_tnbk' => 'required',
            'no_rangka' => 'required|unique:kendaraans,no_rangka',
            'no_mesin' => 'required|unique:kendaraans,no_mesin',
            'isi_silinder' => 'required'
        ], [
            'required' => ':attribute Wajib diisi'
        ]);
        // return dd($request->all());
        Kendaraan::create([
            'no_pintu' => $request->no_pintu,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'no_polisi' => $request->no_polisi,
            'warna_kendaraan' => $request->warna_kendaraan,
            'warna_tnbk' => $request->warna_tnbk,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'isi_silinder' => (int)$request->isi_silinder

        ]);
        return redirect()->route('kendaraan.data')->with('success', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $jeniskendaraan = JenisKendaraan::where('status', 'on')->get();
        $kendaraan = Kendaraan::find($id);
        // dd($kendaraan);
        return view('superAdmin.kendaraan.edit', compact('jeniskendaraan', 'kendaraan'));
    }

    // untuk proses update data

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_pintu' => 'nullable',
            'id_jenis_kendaraan' => 'required',
            'no_polisi' => 'required|unique:kendaraans,no_polisi,' . $id,
            'warna_kendaraan' => 'required',
            'warna_tnbk' => 'required',
            'no_rangka' => 'required|unique:kendaraans,no_rangka,' . $id,
            'no_rangka' => 'required|unique:kendaraans,no_rangka,' . $id,
            'isi_silinder' => 'required'
        ], [
            'required' => ':attribute Wajib diisi'
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        // dd($id);
        //update hanya atribut yang diperbolehkan
        $updatData = [

            'no_pintu' => $request->no_pintu,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'no_polisi' => $request->no_polisi,
            'warna_kendaraan' => $request->warna_kendaraan,
            'warna_tnbk' => $request->warna_tnbk,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'isi_silinder' => (int)$request->isi_silinder
        ];


        $kendaraan->update($updatData);



        // Update semua field yang ada dalam request
        // $kendaraan->update($request->all());
        return redirect()->route('kendaraan.data')->with('success', 'Data kendaraan berhasil diupdate');
    }




    // penggunaan soft delete
    public function delete(Request $request, $id)
    {
        $datadelet = Kendaraan::find($id);

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
        $datadelete = Kendaraan::withTrashed()->find($id);

        if (!$datadelete) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $datadelete->restore();
        // $datadelete->forceDelete() digunakan untuk delete permanen
        return redirect()->back()->with('success', 'User berhasil dikembalikan.');
    }
}
