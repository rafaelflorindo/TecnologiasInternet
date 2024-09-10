<?php
class Produto{
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
        $statement = $this->connection->prepare("SELECT * FROM Produto ORDER BY Produto OFFSET 00
         ROWS FETCH NEXT 10 ROWS ONLY");
        $statement->execute();
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function listOne($IDProduto){
        $statement = $this->connection->prepare("
        SELECT * FROM Produto where IDProduto = :IDProduto");
        $statement->execute(array(":IDProduto"=>$IDProduto));
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    /*public function delete($IDProduto){
        $statement = $this->connection->prepare("
        delete from Produto where IDProduto = :IDProduto");
        $usuarioExcluido = $statement->execute(array(":IDProduto"=>$IDProduto));
  
        if($usuarioExcluido)
            return true;
        else   
            return false;
    }

    public function addLoja($IDProduto, $loja, $Estado, $SiglaUF, $Cidade){
        try {
        $statement = $this->connection->prepare("
        insert into Produto (IDProduto, loja) 
        values(:IDProduto, :loja)");

        $statement->execute(
            array(
                ":IDProduto" => $IDProduto,
                ":loja" => $loja
        )); 
        return true;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }        
    }
    public function updateLoja($IDProduto, $loja){
        try {
        $statement = $this->connection->prepare("
        update Produto set
        loja = :loja 
        where IDProduto = :IDProduto");

        $statement->execute(
            array(
                ":IDProduto" => $IDProduto,
                ":loja" => $loja
        )); 
        return true;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }        
    }*/
}