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

        $data = Admin::where('nama', 'like', '${$query}%')->get();
        return view('superAdmin.index', compact('data'));
    }
}
