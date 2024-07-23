<?php

session_start();


if (isset($_POST['genre_id'])){
    $new_genre = $_POST['genre_id'];

    if ($new_genre == $_SESSION['conditions']['genre']) return;
    
    $_SESSION['conditions']['genre'] = $new_genre;
    
} elseif (isset($_POST['type'])) {
    $new_type = $_POST['type'];

    if ($new_type == $_SESSION['conditions']['type']) return;
    
    $_SESSION['conditions']['type'] = $new_type;
    
}else {
    header("location:./../../frontend/index.php?erro=1");
    die();
}
$genre = $_SESSION['conditions']['genre'];
$type = $_SESSION['conditions']['type'];

header("location:./../../frontend/index.php?type=$type&genre=$genre");