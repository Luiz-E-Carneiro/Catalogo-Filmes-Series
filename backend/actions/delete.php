<?php

require_once("./../db/config.php");
require_once("./../db/Database.php");

$db = new Database();

$query = "DELETE FROM carros WHERE id = :id";
$binds = [
    ":id" => $_GET["id"]
];

$db->execute($query, $binds);


$success = $db->execute($query, $binds);

if ($success) {
    header("location: index.php");
} else {
    echo "Deu erro :(";
}