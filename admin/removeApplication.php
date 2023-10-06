<?php
session_start();
require_once("../db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: ../index.php');
}

$id = $connect->real_escape_string($_GET["id"]);
$sql = "DELETE FROM `applications` WHERE `id` = '$id'";
if($result = $connect->query($sql)){
    header("Location: admin.php");
} else {
    $_SESSION['message'] = "Ошибка в удаление заявки";
    header("Location: admin.php");
}
?>