<?php

require_once("./../db/config.php");
require_once("./../db/Database.php");

$db = new Database();

$query = "DELETE FROM obras WHERE id = :id";
$binds = [
    ":id" => $_POST["id"]
];

$db->execute($query, $binds);

$success = $db->execute($query, $binds);

if ($success) {
    header("location: ./../../frontend/index.php");
} else {
    echo "Deu erro :(";
}