<?php

require_once("./../db/config.php");
require_once("./../db/Database.php");

$db = new Database();

$query = "UPDATE obras
        SET titulo = :titulo, imagem= :imagem, sinopse= :sinopse, tipo= :tipo ,id_genero= :id_genero
        WHERE id = :id";
$binds = [
    ":titulo" => $_POST['titulo'],
    ":imagem" => $_POST['imagem'],
    ":sinopse" => $_POST['sinopse'],
    ":tipo" => $_POST['tipo'],
    ":id_genero" => $_POST['id_genero'],
    ":id" => $_POST['id']
];

$success = $db->execute($query, $binds);

if ($success) {
    header("location: ./../../frontend/index.php");
} else {
    echo "Deu erro :(";
}