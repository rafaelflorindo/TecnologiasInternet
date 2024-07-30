<?php
class Receita{
    private $nome;
    private $proprietario;
    public $ingredientes = array();//é um array dinâmico

    public function __construct($nome, $proprietario){
        $this->setNome($nome);
        $this->setProprietario($proprietario);
    }
    private function setNome($nome){
        $this->nome = $nome;
    }
    private function setProprietario($proprietario){
        $this->proprietario = $proprietario;
    }
    function setIngredientes($ingredientes){
        $this->ingredientes[] = $ingredientes;
    }
    function getNome(){
        return $this->nome;
    }
    function getProprietario(){
        return $this->proprietario;
    }
}