<?php

require_once("./../db/Database.php");
require_once("./../db/config.php");
$db = new Database();

// $genres = $db->Select("SELECT * FROM generos");

$query = "INSERT INTO obras (titulo, imagem, sinopse, tipo, id_genero) VALUES (:titulo, :imagem, :sinopse, :tipo, :id_genero)";

$binds = [
    ":titulo" => $_POST['titulo'],
    ":imagem" => $_POST['imagem'],
    ":sinopse" => $_POST['sinopse'],
    ":tipo" => $_POST['tipo'],
    ":id_genero" => $_POST['id_genero']
];

print_r($binds);

$success = $db->execute($query, $binds);

if ($success) {
    header("location: ./../../frontend/index.php");
} else {
    echo "Deu erro :(";
}