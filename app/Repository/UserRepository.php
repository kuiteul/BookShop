<?php

    namespace App\Repository;

    use App\Models\UserModel;
    use App\Repository\LogRepository;
    use App\Models\LogModel;
    use Exception;


class UserRepository
{
    protected $user_repo;
    protected $_log;
    protected $_log_repo;

    public function __construct(UserModel $user, LogModel $log, LogRepository $log_repo)
    {   
        $this->_user_repo = $user;
        $this->_log = $log;
        $this->_log_repo = $log_repo;

    }

    public function save(UserModel $user, Array $input)
    {
        $user->f_name = $input['first-name'];
        $user->l_name = $input['last-name'];
        $user->email = $input['email'];
        $user->telephone = $input['telephone'];
        $user->country = $input['country'];
        $user->city = $input['city'];
        $user->password = bcrypt($input['password']);
        
        try
        {
            $user->save();
            return true;
        }
        catch(Exception $e)
        {
            
            $log = new $this->_log;
            $array = array(
                "log_error" => "Failed to insert ". $user . " into the database",
                "log_message" => $e->getMessage()
            );
            $this->_log_repo->save($log, $array);
           
            return false;
        }
    }

    public function store(Array $input)
    {
        $user = new $this->_user_repo;

        return $this->save($user, $input);
        
    }

    public function getPaginate(int $number)
    {
        
        try
        {
            return $this->_user_repo->paginate($number);
        }
        catch(Exception $e)
        {
            return "error";
        }

    }

    public function getUserId(int $user_id)
    {

        try
        {
            return $this->_user_repo->find($user_id);
        }
        catch(Exception $e)
        {
            return "error";
        }

    }

    public function updateUser(Array $input, int $user_id)
    {
        try{
            return $this->_user_repo->where('user_id', $user_id)->update($input);
        }
        catch(Exception $e)
        {
            return "error";
        }
    }

    //Delete user
    public function deleteUser(int $user_id)
    {
        try{
            $this->_user_repo->where('user_id', $user_id)->delete();
            return "success";
        }
        catch(Exception $e)
        {
            return "error";
        }
    }

}