<?php

require_once("./../db/Database.php");
require_once("./../db/config.php");
$db = new Database();

$query = "INSERT INTO avaliacoes (id_obra, nota, observacoes) VALUES (:id_obra, :nota, :observacoes)";
$binds = [
    ":id_obra" => $_POST['id_obra'], 
    ":nota" => $_POST['nota'], 
    ":observacoes" => $_POST['observacoes'] 
];

$success = $db->execute($query, $binds);

if ($success) {
    header("location: ./../../frontend/index.php");
} else {
    echo "Deu erro :(";
}