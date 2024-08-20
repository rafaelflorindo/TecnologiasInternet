<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controler/indexCliente.php" method="POST">
        
        ID Cliente <input type="text" name="IDCliente"><br><br>
        Nome Cliente <input type="text" name="NomeCliente"><br><br>
        Estado <input type="text" name="Estado"><br><br>
        Sigla UF <input type="text" name="SiglaUF"><br><br>
        Cidade <input type="text" name="Cidade"><br><br>
        
        <input type="hidden" name="opcao" value="inserir">
        <input type="submit" value="CADASTRAR">
    </form>
</body>
</html>