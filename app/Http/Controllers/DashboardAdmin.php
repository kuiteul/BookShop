<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardAdmin extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('Admin.index', ['user' => $user]);
    }
}
