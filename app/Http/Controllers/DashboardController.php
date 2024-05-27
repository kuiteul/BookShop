<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Auth;

class DashboardController extends Controller
{
    protected $_user_repo;

    public function __construct(UserRepository $user)
    {
        $this->_user_repo = $user;
    }

    public function index()
    {
        $user = Auth::user();
        
        return view('dashboard', ["user" => $user]);
    }
}
