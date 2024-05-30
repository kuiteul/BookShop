<?php 

    namespace App\Repository;

    use App\Models\GenreModel;
    use App\Models\LogModel;
    use App\Repository\LogRepository;
    use App\Models\BookModel;
    use Exception;

class GenreRepository
{
    protected $_genre_repo;
    protected $_log_repo;
    protected $_log;
    protected $_book_model;

    public function __construct(GenreModel $genre, LogRepository $log_repo, LogModel $log, BookModel $book)
    {
        $this->_genre_repo = $genre;
        $this->_log_repo = $log_repo;
        $this->_log = $log;
        $this->_book_model = $book;
    }

    // store genre into database

    public function save(GenreModel $genre, Array $input)
    {
        $genre->genre_name = $input["genre_name"];
        $genre->genre_description = $input['genre_description'];
        $genre->save();
    }

    public function store(Array $input)
    {
        $genre = new $this->_genre_repo;

        try {
            $this->save($genre, $input);
            return true;
        }
        catch(Exception $e)
        {
            $log = new $this->_log;

            $this->_log_repo->save($log, array([
    
                "log_error" => "Failed to store ". $genre . " into the database",
                "log_message" => $e->getMessage()

            ]));

            return false;
        }
    }

    public function getPaginate(int $number)
    {
        try
        {
            return $this->_genre_repo->paginate($number);
            
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function getGenre(string $genre_id)
    {
        try
        {
          return $this->_genre_repo->where('genre_id', $genre_id)->get();
          
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function update(Array $input, $genre_id)
    {
        try
        {
            $this->_genre_repo->where('genre_id', $genre_id)->update([
                "genre_name" => $input["genre_name"],
                "genre_description" => $input["genre_description"],
                "updated_at" => now()
            ]);
            return true;
        }
        catch(Exception $e)
        {
            $this->_log_repo->store(array([
    
                "log_error" => "Failed to update ". $genre . " into the database",
                "log_message" => $e->getMessage()
            ]));
            return false;
        }
    }

    public function delete(string $genre_id)
    {
        try
        {
            $this->_genre_repo->where('genre_id', $genre_id)->delete();
            $this->_book_model->where('genre_id', $genre_id)->delete();
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}