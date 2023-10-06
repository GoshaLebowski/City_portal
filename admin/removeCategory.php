<?php
session_start();
require_once("../db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: ../index.php');
}

$id = $connect->real_escape_string($_GET["id_categories"]);
$sql = "DELETE FROM categories WHERE id_categories = '$id'";
if($categories = $connect->query($sql)){
    header("Location: admin.php");
} else{
    $_SESSION['message'] = "Ошибка";
    header("Location: admin.php");
}
?>