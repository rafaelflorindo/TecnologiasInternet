<?php
class Venda{
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
        $statement = $this->connection->prepare("SELECT * FROM vendas ORDER BY IDProduto OFFSET 00
         ROWS FETCH NEXT 10 ROWS ONLY");
        $statement->execute();
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function listOne($IDProduto){
        $statement = $this->connection->prepare("
        SELECT * FROM vendas where IDProduto = :IDProduto");
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
*/
    public function addVenda($IDCliente, $IDProduto, $IDLoja, $qtde, $valor, $status){
        try {
            $data = 12345;
        $statement = $this->connection->prepare("
        insert into Vendas (IDCliente, IDProduto, IDLoja, qtde, valor, status, data) 
        values(:IDCliente, :IDProduto, :IDLoja, :qtde, :valor, :status, :data)");

        $statement->execute(
            array(
                ":IDProduto" => $IDProduto,
                ":IDCliente" => $IDCliente,
                ":IDLoja" => $IDLoja,
                ":qtde" => $qtde,
                ":valor" => $valor,
                ":status" => $status,
                ":data" => $data
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
    }
}