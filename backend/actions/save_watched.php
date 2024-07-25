<?php

require_once("./../db/Database.php");
require_once("./../db/config.php");
$db = new Database();

if ($_POST['condition'] == 'assistido') {
    $query = "UPDATE obras
        SET assistida = TRUE
        WHERE id = :id";
} else {
    $query = "UPDATE obras
        SET assistida = FALSE
        WHERE id = :id";
}

$binds = [
    ":id" => $_POST['id']
];

$success = $db->execute($query, $binds);

if ($success) {
    header("location: ./../../frontend/index.php");
} else {
    echo "Deu erro :(";
}
