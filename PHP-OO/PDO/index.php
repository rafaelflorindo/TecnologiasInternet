<?php
/*Aula de hoje:
    CRUD utilizando o PDO
    Base de dados TintasDark
    tabela cliente
    campos: id, nome, cpf, cnpj, endereco, numero, bairro, cep, cidadel, email, 
    data de cadastro e data de atualização
*/

$username ="root";
$password = "";

$conn = new PDO('mysql:host=localhost;dbname=TintasDark', $username, $password);

/*
$selectFull = $conn->query("SELECT * FROM pessoa");
foreach($selectFull as $row) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}
*/    

//preparação de consulta
$selectFull = $conn->prepare('SELECT * FROM pessoa');
$selectFull->execute();

/*
$id = 1;
$selectFull = $conn->prepare('SELECT * FROM pessoa where id= :id');
$selectFull->execute(array('id' => $id));
$selectFull->execute();
*/

$rows = array();
while($row = $selectFull->fetchALL(PDO::FETCH_ASSOC)){
//while($row = $selectFull->fetchALL(PDO::FETCH_OBJ)){
   $rows[] = $row;
}

foreach($rows as $row) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}