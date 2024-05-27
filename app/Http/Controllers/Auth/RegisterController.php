<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repository\UserRepository;

class RegisterController extends Controller

{
    protected $_data;

    public function __construct(UserRepository $data)
    {
        $this->_data = $data;
    }

    public function create() {

        return view('Auth.register');
    }

    public function store(RegisterRequest $request) {

        return view('Auth.confirm', ['user' => $this->_data->store($request->all())]);
        
    }
}
