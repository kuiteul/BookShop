<?php

 namespace App\Repository;

use App\Models\CardModel; 

class CardRepository
{

    protected $_card;

    public function __construct(CardModel $card)
    {
        $this->_card = $card;
    }

    public function save(CardModel $card, Array $input)
    {
        $card->quantity = 1;
        $card->user_id_fk = $input['user-id'];
        $card->book_id_fk = $input['book-id'];
        $card->save();
    }

    public function store(Array $array)
    {
        $card = new $this->_card;

        $this->save($card, $array);
        return true;
    }

    public function getPaginate($number, $user_id)
    {
        return $this->_card->join('book', 'book.book_id', 'basket.book_id_fk')
                            ->join('image', 'image.book_id_fk', 'book.book_id')
                            ->where('basket.user_id_fk', $user_id)
                            ->get();
    }

    public function getNumberOfCard(string $user_id)
    {
        return $this->_card->where('user_id_fk', $user_id)->count();
    }

    public function getCard(string $card_id)
    {
        return $this->_card->where('basket_id', $card_id)->get();
    }

    public function update(Array $array, $card_id)
    {
        
        return $this->_card->where('basket_id', $card_id)->update([
            "quantity" => $array['quantity'],
        ]);
    }

    public function delete(string $card_id)
    {
        return $this->_card->where('basket_id', $card_id)->delete();
    }

}