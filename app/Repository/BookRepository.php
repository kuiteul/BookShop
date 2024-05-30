<?php

    namespace App\Repository;

    use App\Models\BookModel;
    use App\Models\LogModel;
    use App\Repository\LogRepository;
    use Exception;

class BookRepository
{
    protected $_book_repo;
    protected $_log;
    protected $_log_repo;


    public function __construct(BookModel $book, LogModel $log, LogRepository $log_repo)
    {
        $this->_book_repo = $book;
        $this->_log = $log;
        $this->_log_repo = $log_repo;
    }

    // save book into database

    public function save(BookModel $book, Array $input): void
    {
        $book->book_title = $input['book_title'];
        $book->author = $input['author'];
        $book->price = $input['price'];
        $book->description = $input['description'];
        $book->genre_id = $input['genre-id'];
        $book->user_id_fk = $input['user_id_fk'];

        $book->save();
    }

    public function store(Array $input): string
    {
        $book = new $this->_book_repo;

        try
        {

            $this->save($book, $input);
            return true;

        }
        catch(Exception $e)
        {   
            $log = new $this->_log;

            $this->_log_repo->save($log, array(
                "log_error" => "Failed to insert". $book ." into the database",
                "log_message" => $e->getMessage()
            ));

            return false;
        }
        
    }
    
    // Get all book in the database

    public function getPaginate(int $number)
    {
        return $this->_book_repo->join('genre', 'genre.genre_id', '=', 'book.genre_id')->paginate($number);
    }

    // Get a specific book

    public function getBook(string $book_id)
    {
        try
        {
            return $this->_book_repo->join('genre', 'genre.genre_id', '=', 'book.genre_id')->where('book_id', $book_id)->get();
            
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    // Update a specific book

    public function update(Array $input, string $book_id)
    {
        try
        {
            $this->_book_repo->where('book_id', $book_id)->update([
                "book_title" => $input['book_title'],
                "author" => $input['author'],
                "description" => $input['description'],
                "genre_id" => $input['genre-id'],
                "price" => $input['price'],
                "user_id_fk" => $input['user_id_fk'],
                "updated_at" => now()
            ]);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    // Delete a specific book

    public function delete(string $book_id)
    {
        try
        {
            $this->_book_repo->where('book_id', $book_id)->delete();
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

}