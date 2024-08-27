<style>
        /*body {
            display: flex;
            justify-content: center;
            align-items: center;
        }*/
        table, th, tr, td {
            padding: 10px;
            font-size: 25px;
            border-collapse: collapse;
        }
        table, th {
            width: 80%;
            border: 2px solid #FF760C;
        }
        td {
            border-bottom: 1px solid #8395a7;
            border-right: 1px solid #8395a7;
        }
        a{
            text-decoration: none;
        }
        .btn-cadastrar {
            background-color: #007bff; /* Cor de fundo azul */
            color: white;              /* Cor do texto branco */
            border: none;              /* Sem borda */
            padding: 10px 20px;        /* Espaçamento interno */
            font-size: 16px;           /* Tamanho da fonte */
            border-radius: 5px;        /* Bordas arredondadas */
            cursor: pointer;           /* Mão ao passar o cursor */
            transition: background-color 0.3s ease; /* Transição suave para a cor de fundo */
        }

.btn-cadastrar:hover {
    background-color: #0056b3; /* Cor de fundo quando o cursor está sobre o botão */
}
.alert {
    padding: 15px;
    margin: 15px 0;
    border-radius: 5px;
    color: #fff;
    font-family: Arial, sans-serif;
}

/* Estilos específicos para alertas de sucesso */
.alert-success {
    background-color: #4CAF50; /* Verde */
    border: 1px solid #388E3C; /* Verde escuro */
}

/* Opcional: estiliza o texto em negrito */
.alert strong {
    font-weight: bold;
}
.alert-error {
    background-color: #f44336; /* Vermelho */
    border: 1px solid #d32f2f; /* Vermelho escuro */
}
    </style>
<?php

class ListarCliente{

    public function cadastrarCliente(){
        ?>
        <form action="controler/indexCliente.php" method="POST">
        ID Cliente <input type="text" name="IDCliente"><br><br>
        Nome Cliente <input type="text" name="NomeCliente"><br><br>
        Estado <input type="text" name="Estado"><br><br>
        Sigla UF <input type="text" name="SiglaUF"><br><br>
        Cidade <input type="text" name="Cidade"><br><br>
        
        <input type="hidden" name="opcao" value="inserir">
        <input type="submit" value="CADASTRAR">
    </form>
    <?php
    }
    
    public function ListarTodos($users){
        //&acao=excluir&mensagem=sucesso

        if(isset($_GET["acao"]) && !empty($_GET["acao"]) && isset($_GET["mensagem"]) && !empty($_GET["mensagem"])){
            $acao = $_GET["acao"];
            $mensagem = $_GET["mensagem"];

            if($acao == "excluir"){
                if ($mensagem=="sucesso"){
                    ?>
                    <div class="alert alert-success">
                        <strong>Sucesso!</strong> Registro Excluido com sucesso.
                    </div>
                    <?php
                }elseif($mensagem=="erro"){
                    ?>
                    <div class="alert alert-error">
                        <strong>Erro!</strong> Erro ao excluir o registro.
                    </div>
                    <?php
                    
                }else{
                    echo "Erro de Mensagem!!!";
                }

            }
        }
    ?>
    
        <a href="index.php?pagina=Cliente&opcao=inserir">
            <button class="btn-cadastrar">Cadastrar</button>
        </a><br>
        <!--<img src="./view/registro.png" width="30px">Cadastrar novo cliente</a><br>-->
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>ESTADO</th>
                <th>SIGLA UF</th>
                <th>CIDADE</th>
                <th>AÇÃO          </th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['IDCliente'] ?></td>
            <td><?php echo $user['NomeCliente'] ?></td>
            <td><?php echo $user['Estado'] ?></td>
            <td><?php echo $user['SiglaUF'] ?></td>
            <td><?php echo $user['Cidade'] ?></td>
            <td>
                <a href="index.php?pagina=Cliente&opcao=editar&IDCliente=<?=$user['IDCliente'];?>">
                    <img src="./view/botao-editar.png" width="30px">
                </a>
                <a href="index.php?pagina=Cliente&opcao=listOne&IDCliente=<?=$user['IDCliente'];?>">
                    <img src="./view/listarUm.png" width="30px">
                </a>
                <a href="index.php?pagina=Cliente&opcao=excluir&IDCliente=<?=$user['IDCliente'];?>">
                    <img src="./view/excluir.png" width="30px">
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php
    }

    public function ListarUm($user){
        echo "<pre>";
            print_r($user);
        echo "</pre>";
    }
}