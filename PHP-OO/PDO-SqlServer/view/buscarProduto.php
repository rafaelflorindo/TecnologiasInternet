<?php
include("../model/Produto.php");
include("../model/Cliente.php");
include("../model/Loja.php");

if(isset($_POST["IDLoja"]) && isset($_POST["IDCliente"]) && !empty($_POST["IDLoja"]) 
&& !empty($_POST["IDCliente"])){
    $IDLoja = $_POST["IDLoja"];
    $IDCliente = $_POST["IDCliente"];  

    $produto = new Produto();
    $produtos = $produto->listAll();

    $loja = new Loja();
    $lojas = $loja->listOne($IDLoja);
    $cliente = new Cliente();
    $clientes = $cliente->listOne($IDCliente);

    ?>
    <h1>Loja: <?=$lojas[0]["Loja"];?></h1>
    <h2>Cliente: <?=$clientes[0]["NomeCliente"];?></h2>
    <table>
        <?php

        foreach($produtos as $itensProdutos){
            ?>
                <div style="display: flex; width: 50%; margin: 10px; border: 1px solid black; border-radius: 7px">
                    
                    <div style="width: 70%;"><h2><?=$itensProdutos["Produto"];?></h2>
                        <img src="<?=$itensProdutos["ImagemProduto"];?>">
                    </div>
                    <div style="width: 30%;">
                    <h2>R$ <?=$itensProdutos["Preco"];?></h2>
                    <form action="confirmarVenda.php" method="POST">
                        Quantidade:<input style="height: 30px" type="number" name="quantidade">
                        Desconto:<input  style="height: 30px" type="number" name="desconto">

                        <input type="hidden" name="IDCliente" value="<?=$IDCliente;?>">
                        <input type="hidden" name="IDLoja" value="<?=$IDLoja;?>">
                        <input type="hidden" name="preco" value="<?=$itensProdutos["Preco"];?>">
                        <input type="hidden" name="IDProduto" value="<?=$itensProdutos["IDProduto"];?>">
                        
                        <input  style="height: 30px" type="submit" value="Adicionar">
                    </form>
                    </div>
                </div>
            <?php
        }
    ?>
    </table>
    <?php
}