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
}
