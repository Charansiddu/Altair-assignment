<?php
class Database{
    protected $db = null;

    function __construct()
    {
        $this->db = new PDO("mysql:host=db;dbname=database", "user", "password");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function save(){
        foreach($this->columns as $field){
            $values[] = $this->$field;
        }
        
        $columns = $this->commaSeparate($this->columns, "`");
        $finalValues = $this->commaSeparate($values, "'");
        $table = $this->commaSeparate($this->table, "`");

        $query = "INSERT INTO $table ($columns) VALUES ($finalValues)";
        $this->db->query($query);
        $this->setModelId();
    } 

    public function get($id){
        $table = $this->commaSeparate($this->table, "`");
        $query = "Select * From $table Where id = $id";
        $result = $this->db->query($query)->fetch();
        
        return $result;        
    }

    public function getAll(){
        $table = $this->commaSeparate($this->table, "`");
        $query = "Select * From $table";
        $result = $this->db->query($query)->fetchAll();
        
        return $result;        
    }

    public function update(Array $values){
        $table = $this->commaSeparate($this->table, "`");
        $query = "UPDATE $table SET ";

        foreach($values as $key=>$value) {
            $query .= $key . " = " . "'".$value."'" . ", "; 
        }

        $query = trim($query, ' ');
        $query = trim($query, ',');
        $query .= " WHERE id = $this->id";
        $query .= ";";

        $this->db->query($query);
    }

    public function delete(){
        $table = $this->commaSeparate($this->table, "`");

        $query = "DELETE from $table WHERE id = $this->id;";

        $this->db->query($query);
    }

    private function commaSeparate($input, $delimeter){
        $output = "";

        if(is_array($input)){
            $output = implode("$delimeter,$delimeter",$input);
            $output = "$delimeter".$output."$delimeter";
        }
        else{
            $output = "$delimeter".$input."$delimeter";
        }

        return $output;
    }

    private function setModelId(){
        $this->id = $this->db->lastInsertId();
    }
}

?>