<?php

class Pessoa{
    public $username ="root";
    public $password = "";
    public $conn;    

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=TintasDark', 
        $this->username, $this->password);        
    }
    public function selectFull(){
        $selectFull = $this->conn->prepare('SELECT * FROM pessoa');
        $selectFull->execute();

        $rows = array();
        while($row = $selectFull->fetchALL(PDO::FETCH_ASSOC)){
            $rows[] = $row;
        }
        return $rows;
    }
    function selectOne($id){
        $selectFull = $this->conn->prepare('SELECT * FROM pessoa where id = :id');
        $selectFull->execute(array('id' => $id));
        $selectFull->execute();    
        
        while($row = $selectFull->fetchALL(PDO::FETCH_ASSOC)){
           $rows = $row;
        }
        return $rows;
    }

}


