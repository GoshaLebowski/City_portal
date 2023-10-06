<?php
session_start();
require_once "../db/db.php";
if (!$_SESSION['admin'] ?? '') {
    header('Location: ../index.php');
}

$path = 'uploads/' . time() . $_FILES['file_proof']['name'];
if (!move_uploaded_file($_FILES['file_proof']['tmp_name'], '../' . $path)){
    $_SESSION['message'] = "Ошибка при загрузки фото";
    header("Location: admin.php");
}
$id = $connect->real_escape_string($_GET["id"]);
$sql = "UPDATE applications SET `file_path_proof` = '$path' WHERE id = '$id'";
if($result = $connect->query($sql)){
    header("Location: admin.php");
} else{
    $_SESSION['message'] = "Ошибка загрузки в бд";
    header("Location: admin.php");
}
?>