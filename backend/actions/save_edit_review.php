<?php

require_once("./../db/config.php");
require_once("./../db/Database.php");

$db = new Database();

$query = "UPDATE avaliacoes
        SET nota = :nota, observacoes= :observacoes
        WHERE id = :id";
$binds = [
    ":nota" => $_POST['nota'],
    ":observacoes" => $_POST['observacoes'],
    ":id" => $_POST['id'],
];

$success = $db->execute($query, $binds);

if ($success) {
    header("location: ./../../frontend/index.php");
} else {
    echo "Deu erro :(";
}