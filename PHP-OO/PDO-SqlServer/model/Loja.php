<?php
class Loja{
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
        //$statement = $this->connection->prepare("SELECT * FROM clientes");
        $statement = $this->connection->prepare("SELECT * FROM Lojas ORDER BY loja OFFSET 00
         ROWS FETCH NEXT 10 ROWS ONLY");
        $statement->execute();
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function listOne($IDLoja){
        $statement = $this->connection->prepare("
        SELECT * FROM lojas where IDLoja = :IDLoja");
        $statement->execute(array(":IDLoja"=>$IDLoja));
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function delete($IDLoja){
        $statement = $this->connection->prepare("
        delete from clientes where IDLoja = :IDLoja");
        $usuarioExcluido = $statement->execute(array(":IDLoja"=>$IDLoja));
        
        //$users = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($usuarioExcluido)
            return true;
        else   
            return false;
    }

    public function addLoja($IDLoja, $loja, $Estado, $SiglaUF, $Cidade){
        try {
        $statement = $this->connection->prepare("
        insert into clientes (IDLoja, loja) 
        values(:IDLoja, :loja)");

        $statement->execute(
            array(
                ":IDLoja" => $IDLoja,
                ":loja" => $loja
        )); 
        return true;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }        
    }
    public function updateLoja($IDLoja, $loja){
        try {
        $statement = $this->connection->prepare("
        update clientes set
        loja = :loja 
        where IDLoja = :IDLoja");

        $statement->execute(
            array(
                ":IDLoja" => $IDLoja,
                ":loja" => $loja
        )); 
        return true;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }        
    }
}