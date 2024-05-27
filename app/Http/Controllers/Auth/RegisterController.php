<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function create() {

        return view('Auth.register');
    }

    public function store(RegisterRequest $request) {


    }
}
