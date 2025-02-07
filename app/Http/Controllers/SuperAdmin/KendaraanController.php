<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisKendaraan;

class KendaraanController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = Kendaraan::where('no_polisi', 'like', '%' . $query . '%')->get();

        return view('superAdmin.kendaraan.index', compact('data'));
    }

    public function create()
    {
        $jeniskendaraan = JenisKendaraan::all();
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
            'isi_silinder' => $request->isi_silinder

        ]);
        return redirect()->route('kendaraan.data')->with('success', 'Data berhasil diinput');
    }
}
