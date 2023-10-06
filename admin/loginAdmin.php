<?php
session_start();

if ($_SESSION['user'] ?? '') {
    header('Location: ../user.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Авторизация администрации</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-register.css">
</head>

<body>
    <div class="body-form">
        <main>
            <form name="logForm" onsubmit="return volidateForm()"
                action="authorizationAdmin.php" method="post">
                <div class="headerText">
                    <h3>Вход</h3>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="login" name="login" id="login" placeholder="Логин">
                    <label class="text-field__label" for="login">Логин</label>
                    <div class="error" id="loginErr"></div>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="password" name="password" id="password" placeholder="Пароль">
                    <label class="text-field__label" for="password">Пароль</label>
                    <div class="error" id="passwordErr"></div>
                </div>
                <div class="reg-btn">
                    <input class="btn btn-primary btn-lg" type="submit" value="Войти">
                </div>
                <div class="error-php">
                    <?php
                    if ($_SESSION['message'] ?? '') {
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>
                </div>
            </form>
        </main>
    </div>

    <script src="../js/login.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>