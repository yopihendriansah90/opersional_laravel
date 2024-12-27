<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\DriverKendaraan;
use Illuminate\Http\Request;

class DriverKendaraanController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // $data = DriverKendaraan::where('nama', 'like', '%' . $query . '%')->get();
        // return view('superAdmin.driverkendaraan.index', compact('data'));
        $data = DriverKendaraan::whereHas('driver', function ($q) use ($query) {
            $q->where('nama', 'like', '%' . $query . '%');
        })->get();
        return view('superAdmin.driverkendaraan.index', compact('data'));
    }
}
