<Form action = "buscarProduto.php" method="POST">
<?php
include ("../model/Cliente.php");
include ("../model/Loja.php");
$cliente = new Cliente();
$clientes = $cliente->listAll();
$loja = new Loja();
$lojas = $loja->listAll();

?>
Loja 
<select name="IDLoja">
    <?php
        foreach($lojas as $itenslojas){
            ?>
            <option value="<?=$itenslojas["IDLoja"];?>"><?=$itenslojas["Loja"];?></option>
        <?php
        }
    ?> 
</select>
Cliente
<select name="IDCliente">
        <?php 
            foreach($clientes as $itensClientes){
                ?>
                    <option value="<?=$itensClientes["IDCliente"];?>"><?=$itensClientes["NomeCliente"];?></option>
                <?php
            }
?>
</select>

<input type="submit" value="Abrir Venda">
</Form>