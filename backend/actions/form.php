<?php

    require_once("./../db/config.php");
    require_once("./../db/Database.php");

    $id      = 0;
    $marca   = "";
    $modelo  = "";
    $ano     = "";
    $placa   = "";
    $cor     = "";

    if(isset($_GET['id'])){
        $db = new Database();

        $carro = $db->Select("SELECT * FROM carros WHERE id = :id", [
            ":id" => $_GET['id']
        ]);  
        $id     = $carro[0]['id'];
        $marca  = $carro[0]['marca'];
        $modelo = $carro[0]['modelo'];
        $ano    = $carro[0]['ano'];
        $placa  = $carro[0]['placa'];
        $cor    = $carro[0]['cor'];
    } 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Carro</title>
</head>
<body>
    
    <h1>Formulário de Carro</h1>
    <hr>
    <form action="save.php" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="text" name="marca" id="marca" value="<?php echo $marca; ?>" placeholder="marca...">
        <br>
        <input type="text" name="modelo" id="modelo" value="<?php echo $modelo; ?>" placeholder="modelo...">
        <br>
        <input type="number" name="ano" id="ano" value="<?php echo $ano; ?>" placeholder="ano...">
        <br>
        <input type="text" name="placa" id="placa" value="<?php echo $placa; ?>" placeholder="placa...">
        <br>
        <input type="text" name="cor" id="cor" value="<?php echo $cor; ?>" placeholder="cor...">
        <br>

        <button type="submit">Salvá</button>
        
    </form>

</body>
</html>