<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Auth;

class UserController extends Controller
{
    protected $_users;


    public function __construct(UserRepository $user) 
    {

        $this->_users = $user;
    }

    public function index()
    {
        $user = Auth::user();

        return view('Admin.user.index', ['user' => $user, 'users' => $this->_users->getPaginate(20)]);

    }

    public function show(string $user_id)
    {
        $user = Auth::user();

        return view('Admin.user.show', ['user' => $user, 'users' => $this->_users->getUser($user_id)]);
    }
}
