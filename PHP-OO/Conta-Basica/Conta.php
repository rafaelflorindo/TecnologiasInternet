<?php
    class Conta{
        private $saldo = 0;
        public $titular;

        function depositar($valor){
            $this->saldo += $valor;
        }
        function sacar($valor){
            if($this->saldo >= $valor){
               $this->saldo -= $valor;
            }else{
                echo "Saldo insuficiente";
                echo $this->verSaldo();
            }
        }
        function verSaldo(){
            return "<br>Saldo Atual  R$ " . $this->saldo;
        }
    }