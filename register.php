<?php
session_start();

if ($_SESSION['user'] ?? '') {
    header('Location: user.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title class="lng-title">Регистрация</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-register.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="lng-name navbar-brand" href=" ">Городской портал</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" class="lng-main">Главная</a></li>
                    <li class="active"><a href=" " class="lng-reg">Зарегистрироваться</a></li>
                    <li><a href="login.php" class="lng-enter">Войти</a></li>
                    <!-- <select id="changeLang" class="change-lang style-select">
                        <option value="ru">RU</option>
                        <option value="en">EN</option>
                    </select> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="body-form">
        <main>
            <form name="regForm" onsubmit="return validateForm()" action="./registration and authorization/register.php"
                method="post">
                <div class="headerText">
                    <h3 class="lng-title1">Регистрация</h3>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="text" name="name" id="name" placeholder="ФИО">
                    <label class="lng-fullName text-field__label" for="name">ФИО</label>
                    <div class="error" id="nameErr"></div>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="text" maxlength="10" name="login" id="login" placeholder="Логин">
                    <label class="lng-login text-field__label" for="login">Логин</label>
                    <div class="error" id="loginErr"></div>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="text" name="email" id="email" placeholder="email">
                    <label class="text-field__label" for="email">Email</label>
                    <div class="error" id="emailErr"></div>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="password" name="password" id="password" placeholder="Пароль">
                    <label class="lng-pass text-field__label" for="password">Пароль</label>
                    <div class="error" id="passwordErr"></div>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="password" name="repeatPassword" id="repeatPassword" placeholder="Повтор пороля">
                    <label class="lng-repeatPass text-field__label" for="repeatPassword">Повтор пароля</label>
                    <div class="error" id="repeatPasswordErr"></div>
                </div>
                <div>
                    <input class="custom-checkbox" type="checkbox" id="color-1" name="check">
                    <label for="color-1" class="lng-personalData fw-ctp">Согласие на обработку персональных данных</label>
                    <div class="error" id="checkedErr"></div>
                </div>
                <div class="reg-btn">
                    <button class="lng-reg1 btn btn-primary btn-lg" type="submit">Зарегистрироваться</button>
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

    <!-- <script src="js/lang.js"></script> -->
    <!-- <script src="js/changeLangReg.js"></script> -->
    <script src="js/register.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>