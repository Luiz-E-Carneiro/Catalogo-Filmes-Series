<?php

include_once('./../backend/Components/Header.php');

include_once('./../backend/Components/HeaderBody.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'Home';
$page = preg_replace('/[^a-zA-Z0-9]/', '', $page);

$pageFile = "./../backend/Pages/$page.php";

if (file_exists($pageFile)) {
    include $pageFile;
} else {
    echo "404";
}

include_once('./../backend/Components/Footer.php');