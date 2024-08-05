<?php
/*Aula de hoje:
    CRUD utilizando o PDO
    Base de dados TintasDark
    tabela cliente
    campos: id, nome, cpf, cnpj, endereco, numero, bairro, cep, cidadel, email, 
    data de cadatro e data de atualização
*/

$username ="root";
$password = "";

$conn = new PDO('mysql:host=localhost;dbname=TintasDark', $username, $password);

var_dump($conn);