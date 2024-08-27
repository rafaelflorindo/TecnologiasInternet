<?php
/*include("../model/Cliente.php");
$conn = new Cliente();

$users = $conn->listAll();
//$user = $conn->listOne(279988798625587);
*/

print_r($_GET);

$users = $_GET["users"];

echo $users->$IDCliente;

echo "<pre>";
    print_r($_GET["users"]->$IDCliente);
echo "</pre>";