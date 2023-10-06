<?php
session_start();
require_once("../db/db.php");

$query = "SELECT * FROM `application_status`";
$applicationStatus = mysqli_query($connect, $query);
$status = mysqli_fetch_array($applicationStatus);

$idUser = $_SESSION['user']['id_user'];
$name = $_POST['name'];
$description = $_POST['description'];
$idCategories = $_POST['categories'];
$file_path_proof = 'Загрузка доказательств';
$date = $_SESSION['date'];
$idStatus = $status[0];

if ($_FILES["file"]["size"] > 10818752) {
    $_SESSION['message'] = "Размер файла не должен превышать 10-ти МагаБайт";
    header("Location: newApplication.php");
} else {
    $path = 'uploads/' . time() . $_FILES['file']['name'];
    if (!move_uploaded_file($_FILES['file']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = "Ошибка при загрузки фото";
        header("Location: newApplication.php");
    }

    mysqli_query($connect, "INSERT INTO `applications` (`id`, `id_user`, `name_application`, `descripton`, `id_categories`, 
    `file_path`, `file_path_proof`, `timestamp`, `id_application_status`) 
    VALUES (NULL, '$idUser', '$name', '$description', '$idCategories', '$path', '$file_path_proof', '$date', '$idStatus')");    

    header("Location: newApplication.php");
}
?>