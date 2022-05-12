<?php
include_once "database/Database.php";

class BaseModel extends Database{
    protected $table = null;
    protected $columns = null;
    protected $db = null;

    function __construct()
    {
        parent::__construct();  
    }

    public function create(Array $values){
        $i = 0;
        foreach($this->columns as $field){

            $this->$field = $values[$field];
            $i++;
        }
    }

    public function find($id){
        $result = $this->get($id);

        if($result){
            $this->create($result);
            $this->setModelId($result);
        }
        else{
            throw new Exception('Model with this ID is not found');
        }
    }

    private function setModelId(Array $result){
        $this->id = $result['id'];
    }
}