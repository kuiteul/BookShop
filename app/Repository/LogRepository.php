<?php

    namespace App\Repository;

    use App\Models\LogModel;
    use Exception;

class LogRepository {
    
    protected $_log_repo;

    public function __construct(LogModel $log)
    {
        $this->_log_repo = $log;
    }

    public function save(LogModel $log, Array $input)
    {
        $log->log_error = $input['log_error'];
        $log->log_message = $input['log_message'];
        $log->save();
    }

    public function store(Array $input)
    {
        $log = new $this->_log_repo;

        try {
            $this->_log_repo->save($log, $input);
        }
        catch(Exception $e)
        {
            die($e.getMessage());
        }
    }

    public function getPaginate($number)
    {
        return $this->_log_repo->paginate($number);
    }

    public function getLog(string $log_id)
    {
        return $this->_log_repo->where('log_id', $log_id);
    }
}