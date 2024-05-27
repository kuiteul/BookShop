<?php

    namespace App\Repository;

    use App\Models\UserModel;
    use Exception;


class UserRepository
{
    protected $user_repo;

    public function __construct(UserModel $user)
    {   
        $this->_user_repo = $user;

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
        }
        catch(Exception $e)
        {
            die("<h1><center>Error when inserting the data</center></h1><br><br><br>". $e->getMessage());
        }
    }

    public function store(Array $input)
    {
        $user = new $this->_user_repo;

        $this->save($user, $input);
        
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