<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = Driver::where('nama', 'like', '%' . $query . '%')->get();
        return view('superAdmin.driver.index', compact('data'));
    }
}
