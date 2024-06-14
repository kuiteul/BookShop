<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Repository\BookRepository;
use App\Repository\CardRepository;
use Auth;

class DashboardController extends Controller
{
    protected $_user_repo;
    protected $_book;
    protected $_card;

    public function __construct(UserRepository $user, BookRepository $book, CardRepository $card)
    {
        $this->_user_repo = $user;
        $this->_book = $book;
        $this->_card = $card;
    }

    public function index()
    {
        $user = Auth::user();
        $book = $this->_book->getPaginate(20);
        if(isset($user->user_id))
            $card_number = $this->_card->getNumberOfCard($user->user_id);
        else
            $card_number = 0;

        
        return view('dashboard', ["user" => $user, "book" => $book, 'card_number' => $card_number]);
    }
}
