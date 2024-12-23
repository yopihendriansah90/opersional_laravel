<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KendaraanController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = Kendaraan::where('no_polisi', 'like', '%' . $query . '%')->get();
        return view('superAdmin.kendaraan.index', compact('data'));
    }
}
