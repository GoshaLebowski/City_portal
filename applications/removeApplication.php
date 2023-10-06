<?php
session_start();
require_once("../db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: ../index.php');
}

$idUser = $_SESSION['user']['id_user'];

$id = $connect->real_escape_string($_GET["applica_id"]);
$id_user = $connect->real_escape_string($idUser);
$sql = "DELETE FROM applications WHERE id_user = '$id_user' and id = '$id'";
if($result = $connect->query($sql)){
    header("Location: withdrawalOfApplications.php");
} else{
    $_SESSION['message'] = "Ошибка";
    header("Location: message_check.php");
}
?>