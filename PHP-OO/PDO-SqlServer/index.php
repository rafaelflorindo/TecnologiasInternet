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
    }

}

$conn = new Cliente();
$inserir = $conn->addCliente(2799887986255878, "Rafael", "Paraná", "PR", "Maringá");

$users = $conn->listAll();
//$user = $conn->listOne(279988798625587);

echo "<pre>";
    print_r($users);
echo "</pre>";
