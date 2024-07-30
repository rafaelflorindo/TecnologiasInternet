<?php
spl_autoload_register(
    function ($class_name){
        include $class_name . '.php';
    }
);

$conta = new Conta();
$conta->titular = "Rafael";


$conta->depositar(500);
$conta->depositar(700);
$conta->sacar(200);
$conta->sacar(500.50);
$conta->sacar(499.5);

echo "<pre>"; var_dump($conta); echo "</pre>";