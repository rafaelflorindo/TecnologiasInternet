<?php
class Cliente{
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("sqlsrv:Database=VendaVeiculos;server=localhost\SQLEXPRESS", "", "");
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }   
    } 

    public function listAll(){
        $statement = $this->connection->prepare("SELECT * FROM clientes");
        $statement->execute();
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function listOne($IDCliente){
        $statement = $this->connection->prepare("
        SELECT * FROM clientes where IDCliente = :IDCliente");
        $statement->execute(array(":IDCliente"=>$IDCliente));
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function addCliente($IDCliente, $NomeCliente, $Estado, $SiglaUF, $Cidade){
        try {
        $statement = $this->connection->prepare("
        insert into clientes (IDCliente, NomeCliente, Estado, SiglaUF, Cidade) 
        values(:IDCliente, :NomeCliente, :Estado, :SiglaUF, :Cidade)");

        $statement->execute(
            array(
                ":IDCliente" => $IDCliente,
                ":NomeCliente" => $NomeCliente,
                ":Estado" => $Estado,
                ":SiglaUF" => $SiglaUF,
                ":Cidade" => $Cidade
        )); 
        return true;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }        
    }

}