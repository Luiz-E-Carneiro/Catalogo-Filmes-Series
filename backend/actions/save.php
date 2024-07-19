<?php


require_once("./../db/config.php");
require_once("./../db/Database.php");
$db = new Database();

if($_POST["id"] == 0){
    $query = "INSERT INTO carros (marca, modelo, ano, placa, cor) VALUES(:marca, :modelo, :ano, :placa, :cor)";
    
    $binds = [
        ":marca"=> $_POST["marca"],
        ":modelo"=> $_POST["modelo"],
        ":ano"=> $_POST["ano"],
        ":placa"=> $_POST["placa"],
        ":cor"=> $_POST["cor"]
    ];
} else {
    $query = "UPDATE  carros SET marca = :marca, modelo= :modelo, ano = :ano, placa = :placa, cor = :cor WHERE id = :id";
    
    $binds = [
        ":marca"=> $_POST["marca"],
        ":modelo"=> $_POST["modelo"],
        ":ano"=> $_POST["ano"],
        ":placa"=> $_POST["placa"],
        ":cor"=> $_POST["cor"],
        ":id"=> $_POST["id"]
    ];
}



$success = $db->execute($query, $binds);

if ($success) {
    header("location: index.php");
} else {
    echo "Deu erro :(";
}