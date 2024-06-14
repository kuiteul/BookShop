<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CardRepository;
use Auth;

class CardController extends Controller
{
    protected $_card;

    public function __construct(CardRepository $card)
    {
        $this->_card = $card;
    }

    //List of all shopping card of auser
    public function index()
    {
        $user = Auth::user();
        $card_number = $this->_card->getNumberOfCard($user->user_id);
        return view('card.index', ['user' => $user, 'card' => $this->_card->getPaginate(20, $user->user_id), "card_number" => $card_number]);
    }

    //Store Card chosen by user
    public function store(Request $request)
    {
        $this->_card->store($request->all());
        return view('card.store', ["user" => Auth::user()]);
    }

    //Show information about a card
    public function show(string $card_id)
    {
        return view('card.show', $this->_card->getCard($card_id));
    }

    //update a card
    public function update(Request $request, string $card_id)
    {
        return view('card.update', $this->_card->update($request->all(), $card_id));
    }

    //Delete a card
    public function delete(string $card_id)
    {
        return view('card.delete', $this->_card->delete($card_id));
    }
}
