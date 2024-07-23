<?php
require_once("./../backend/db/Database.php");
require_once("./../backend/db/config.php");

require_once("./../backend/Components/Card.php");

include_once('./../backend/Components/Header.php');
include_once('./../backend/Components/HeaderBody.php');


session_start();

if (!isset($_SESSION['conditions'])) {
    $_SESSION['conditions'] =[
        "type" => "filme",
        "genre" => "0"
    ];
}

$page = isset($_GET['page']) ? $_GET['page'] : 'Home';
$page = preg_replace('/[^a-zA-Z0-9]/', '', $page);

$pageFile = "./../backend/Pages/$page.php";

if (file_exists($pageFile)) {
    include $pageFile;
} else {
    echo "404";
}

include_once('./../backend/Components/Footer.php');