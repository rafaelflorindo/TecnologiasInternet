<?php
spl_autoload_register(
    function ($class_name){
        include $class_name . '.php';
    }
);

$boloFuba = new Receita("Bolo de Fubá", "José");
//$boloFuba->setIngredientes("3 xícaras de Fuba");
$boloFuba->setIngredientes(
    array(
        "quantidade"=>"3", 
        "unidade"=>"xícara", 
        "ingrediente"=>"Fubá")
    );
$boloFuba->setIngredientes( array(
    "quantidade"=>"4", 
    "unidade"=>"unid", 
    "ingrediente"=>"Ovo"));
$boloFuba->setIngredientes( array(
    "quantidade"=>"1", 
    "unidade"=>"xícara", 
    "ingrediente"=>"Óleo"));
?>
<h1>Receita: <?=$boloFuba->getNome();?></h1>
<h2>Proprietario: <?=$boloFuba->getProprietario();?></h2>
<table>
    <?php
        foreach($boloFuba->ingredientes as $key => $value){  
    ?>
    <tr>
        <td><?=$value["quantidade"];?></td>
        <td><?=$value["unidade"];?></td>
        <td><?=$value["ingrediente"];?></td>
    </tr>
    <?php
        }
    ?>
</table>