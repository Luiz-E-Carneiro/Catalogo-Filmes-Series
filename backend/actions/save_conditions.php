<?php

session_start();


if (isset($_POST['genre_id'])){
    $new_genre = $_POST['genre_id'];
    
    $_SESSION['conditions']['genre'] = $new_genre;
    
} elseif (isset($_POST['type'])) {
    $new_type = $_POST['type'];
    
    $_SESSION['conditions']['type'] = $new_type;
    
}else {
    header("location:./../../frontend/index.php?erro=1");
    die();
}
$genre = $_SESSION['conditions']['genre'];
$type = $_SESSION['conditions']['type'];

header("location:./../../frontend/index.php?type=$type&genre=$genre");