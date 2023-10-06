<?php
session_start();
if (!$_SESSION['admin'] ?? '') {
    header('Location: ../index.php');
}

require_once "../db/db.php";

$id_message = $_POST['updateSelect'];

$status = $connect->real_escape_string($_POST["updateSelect"]);
$id = $connect->real_escape_string($_GET["id"]);
$sql = "UPDATE `applications` SET `id_application_status` = '$status' WHERE `id` = '$id'";
if ($result = $connect->query($sql)) {
    header("Location: admin.php");
} else {
    if ($status == null) {
        $_SESSION['message'] = "Ошибка, в изменение статуса";
        header("Location: admin.php");
    }
}

?>