<?php
session_start();
require_once("../db/db.php");

$login = $_POST['login'];
$password = $_POST['password'];

$check_admin = mysqli_query($connect, "SELECT * FROM `admin` 
    WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_admin) > 0) {

    $admin = mysqli_fetch_assoc($check_admin);

    $_SESSION['admin'] = [
        "id" => $admin['id'],
        "login" => $admin['login']
    ];

    header('Location: admin.php');
} else {
    $_SESSION['message'] = "Не верный логин или пароль";
    header('Location: loginAdmin.php');
}
?>