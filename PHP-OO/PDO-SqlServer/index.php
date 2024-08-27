<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnologias para Internet</title>
</head>
<body>
    <a href="view/formularioCadastroCliente.php">Cadastrar Cliente</a>
    <a href="controler/indexCliente.php?opcao=listAll">Listar Todos os Cliente</a>
    <a href="controler/indexCliente.php?opcao=listOne&IDCliente=1515142996">Listar um Cliente</a>
</body>
</html>-->

<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnologias para Internet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php?pagina=Cliente&opcao=listAll">Cliente</a>
        <a href="index.php?pagina=Produto&opcao=listAll">Produto</a>
        <a href="Item">z</a>
    </div>
    <div style="padding:20px;">
    <?php
        if(isset($_GET["pagina"]) && !empty($_GET["pagina"])){
            $pagina = $_GET["pagina"]; //Cliente
            include ("controler/index".$pagina.".php");//controler/indexCliente.php
            //controler/indexProduto.php
        }else{
            ?>
            <h1>Bem-vindo ao Menu Horizontal</h1>
            <p>Este é um exemplo simples de menu horizontal em uma página PHP.</p>
            <?php
        }

        ?>
    </div>
</body>
</html>
