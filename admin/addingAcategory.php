<?php
session_start();
require_once("../db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: ../index.php');
}

$name = $_POST['name'];

mysqli_query($connect, "INSERT INTO `categories` (`id_categories`, `categories`) VALUES (NULL, '$name')");
header('Location: admin.php');
?>