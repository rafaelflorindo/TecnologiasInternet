<?php

include("Pessoa.php");

$pessoa1 = new Pessoa();

$resultado = $pessoa1->selectFull();

$id = 2;
$resultado = $pessoa1->selectOne($id);
foreach($resultado as $row) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}


/*Aula de hoje:
    CRUD utilizando o PDO
    Base de dados TintasDark
    tabela cliente
    campos: id, nome, cpf, cnpj, endereco, numero, bairro, cep, cidadel, email, 
    data de cadastro e data de atualização
*/
/*
$username ="root";
$password = "";

$conn = new PDO('mysql:host=localhost;dbname=TintasDark', $username, $password);
*/
/*
$selectFull = $conn->query("SELECT * FROM pessoa");
foreach($selectFull as $row) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}
*/    

//function selectFull(){
    //preparação de consulta full
    /*$selectFull = $conn->prepare('SELECT * FROM pessoa');
    $selectFull->execute();*/
//}


//function selectOne($id)
/*$id = 1;
$selectFull = $conn->prepare('SELECT * FROM pessoa where id = :id');
$selectFull->execute(array('id' => $id));
$selectFull->execute();


$rows = array();
while($row = $selectFull->fetchALL(PDO::FETCH_ASSOC)){
   $rows[] = $row;
}

foreach($rows as $row) {
    echo "<pre>";print_r($row);echo "</pre>";
}*/