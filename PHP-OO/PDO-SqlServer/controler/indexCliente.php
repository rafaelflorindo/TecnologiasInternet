<?php
/*
class IndexCliente{

    public function __construct(){

    }
}
*/

if(isset($_POST["opcao"]) && !empty($_POST["opcao"])){

        if($_POST["opcao"] == "inserir"){
            include("../model/Cliente.php");
            $conn = new Cliente();//model
            if(isset($_POST["IDCliente"]) && isset($_POST["NomeCliente"]) && isset($_POST["Estado"]) && isset($_POST["SiglaUF"]) && isset($_POST["Cidade"]) && !empty($_POST["IDCliente"]) && !empty($_POST["NomeCliente"]) && !empty($_POST["Estado"]) && !empty($_POST["SiglaUF"]) && !empty($_POST["Cidade"])){
                
                $inserir = $conn->addCliente($_POST["IDCliente"], $_POST["NomeCliente"], $_POST["Estado"], $_POST["SiglaUF"], $_POST["Cidade"]);
                           
            if($inserir) 
                header("location: ../view/formularioCadastroCliente.php?mensagem=sucesso");
            else 
                header("location: ../view/formularioCadastroCliente.php?mensagem=erro");
        }}
    }elseif(isset($_GET["opcao"]) && !empty($_GET["opcao"])){
        if($_GET["opcao"] == "inserir"){
            include("./view/ListarCliente.php");
            $cliente = new ListarCliente();//view  
            $inserir = $cliente->cadastrarCliente();          
        }elseif($_GET["opcao"]=="listAll"){
            include("./model/Cliente.php");
            $conn = new Cliente();//model  
            $users = $conn->listAll();
            
            include("./view/ListarCliente.php");
            $cliente = new ListarCliente();//view  
            $cliente->ListarTodos($users);   

        }elseif(($_GET["opcao"] == "listOne") && isset($_GET["IDCliente"]) && !empty($_GET["IDCliente"])){
            include("./model/Cliente.php");
            $conn = new Cliente();//model  
            $user = $conn->listOne($_GET["IDCliente"]);
            //$cliente = new ListarCliente();
            include("./view/ListarCliente.php");
            $cliente = new ListarCliente();
            $cliente->ListarUm($user);
        }elseif(($_GET["opcao"] == "excluir") && isset($_GET["IDCliente"]) && !empty($_GET["IDCliente"])){
            include("./model/Cliente.php");
            $conn = new Cliente();//model  
            $user = $conn->delete($_GET["IDCliente"]);
            
            if($user)
                header("location: index.php?pagina=Cliente&opcao=listAll&acao=excluir&mensagem=sucesso");
            else
                header("location: index.php?pagina=Cliente&opcao=listAll&acao=excluir&mensagem=erro");
        }
    }
     //   echo "Campo(s) obrigatório(s) não preenchido(s). Retorne e preencha todos os campos";
    //}

