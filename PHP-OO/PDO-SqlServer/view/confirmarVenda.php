<?php

echo "<pre>";
var_dump($_POST);
echo "</pre>";
if(isset($_POST["IDCliente"]) && isset($_POST["IDLoja"]) 
&& isset($_POST["IDProduto"]) && isset($_POST["quantidade"]) 
&& isset($_POST["IDProduto"]) && isset($_POST["quantidade"]) 
&& isset($_POST["desconto"]) && isset($_POST["preco"]) 
&& !empty($_POST["IDCliente"]) && !empty($_POST["IDLoja"]) 
&& !empty($_POST["IDProduto"]) && !empty($_POST["quantidade"]) 
&& !empty($_POST["desconto"]) && !empty($_POST["preco"])
){
    
    $IDCliente = $_POST["IDCliente"];
    $IDLoja = $_POST["IDLoja"];
    $IDProduto = $_POST["IDProduto"];
    
    $qtde = (int)$_POST["quantidade"];
    $desconto = (int)$_POST["desconto"];
    $preco = (float)$_POST["preco"];

    $desconto = ($preco * ($desconto/100));
    (float)$valor = $preco - $desconto;

    echo "Preço Final R$ $valor";

    include("../model/Venda.php");
    $venda = new Venda();
    $inserir = $venda->addVenda($IDCliente, $IDProduto, $IDLoja, $qtde, $valor, "Vendas");

    if($inserir)
        echo "Venda realizada com sucesso";
    else
        echo "Erro ao efetuar a venda";
}
