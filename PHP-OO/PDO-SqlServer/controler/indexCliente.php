<?php
include("../model/Cliente.php");
$conn = new Cliente();
if(
    isset($_POST["IDCliente"]) && isset($_POST["NomeCliente"]) 
    && isset($_POST["Estado"]) && isset($_POST["SiglaUF"]) && isset($_POST["Cidade"]) 
    && isset($_POST["opcao"]) 
    && !empty($_POST["IDCliente"]) && !empty($_POST["NomeCliente"]) 
    && !empty($_POST["Estado"]) && !empty($_POST["SiglaUF"]) && !empty($_POST["Cidade"]) 
    && !empty($_POST["opcao"])
    ){
        if($_POST["opcao"] == "inserir"){
            $inserir = $conn->addCliente($_POST["IDCliente"], $_POST["NomeCliente"], $_POST["Estado"], 
            $_POST["SiglaUF"], $_POST["Cidade"]);

            if($inserir) 
                header("location: ../view/formularioCadastroCliente.php?mensagem=sucesso");
            else 
                header("location: ../view/formularioCadastroCliente.php?mensagem=erro");
        }
    }else{
        echo "Campo(s) obrigatório(s) não preenchido(s). Retorne e preencha todos os campos";
    }

$users = $conn->listAll();
//$user = $conn->listOne(279988798625587);

echo "<pre>";
    print_r($users);
echo "</pre>";