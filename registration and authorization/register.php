<?php
session_start();
require_once("../db/db.php");

$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$check_LE = mysqli_query($connect, "SELECT * FROM `users` 
    WHERE `login` = '$login' OR `email` = '$email'");
if (mysqli_num_rows($check_LE) > 0) {
    $_SESSION['message'] = "Такой пользователь уже существует!";
    header('Location: ../register.php');
} else {
    mysqli_query($connect, "INSERT INTO `users` (`id_user`, `name`, `login`, `email`, `password`) 
    VALUES (NULL, '$name', '$login', '$email', '$password')");
    header('Location: ../login.php');
}
?>