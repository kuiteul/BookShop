<?php 

    namespace App\Repository;

    use App\Models\GenreModel;
    use App\Models\LogModel;
    use App\Repository\LogRepository;
    use Exception;

class GenreRepository
{
    protected $_genre_repo;
    protected $_log_repo;

    public function __construct(GenreModel $genre, LogRepository $log_repo)
    {
        $this->_genre_repo = $genre;
        $this->_log_repo = $log_repo;
    }

    // store genre into database

    public function save(GenreModel $genre, Array $input)
    {
        $genre->genre_name = $input["genre-name"];
        $genre->genre_description = $input['genre-description'];
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
        
            $array = [
                "log_error" => "Failed to store ". $input['genre-name'] . " into the database",
                "log_message" => $e.getMessage()
            ];

            $this->_log_repo->store($array);

            return false;
        }
    }

    public function getPaginate(int $number)
    {
        try
        {
            $this->_genre_repo->paginate($number);
            return true;
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
            $this->_genre_repo->where('genre_id', $genre_id);
            return true;
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
            $this->_genre_repo->update($input, $genre_id);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}