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
    ?>
        <a href="index.php?pagina=Cliente&opcao=inserir"><img src="./view/registro.png" width="30px">Cadastrar novo cliente</a><br>
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
