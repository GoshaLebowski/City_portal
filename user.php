<?php
session_start();
require_once("db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: index.php');
}

$results = mysqli_query($connect, "SELECT * FROM `applications` inner join `application_status` 
ON application_status.id_application_status = applications.id_application_status 
WHERE application_status.id_application_status = '2'");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title class="lng-title">Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-img.css">
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
                <a class="lng-name navbar-brand" href="#">Городской портал</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#" class="lng-main">Главная</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <?= $_SESSION['user']['name'] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./applications/withdrawalOfApplications.php" class="lng-myApp">Мои заявки</a></li>
                            <li><a href="./applications/newApplication.php" class="lng-newApp">Новая заявка</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./registration and authorization/logout.php" class="lng-exit">Выход</a></li>
                        </ul>
                    </li>
                    <!-- <select id="changeLang" class="change-lang style-select">
                        <option value="ru">RU</option>
                        <option value="en">EN</option>
                    </select> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1 class="lng-heading">Привет, дорогой друг!</h1>
            <p class="lng-desc">
                Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому
                мы
                предлагаем тебе помочь своему городу!
            </p>
            <p class="lng-desc1">
                Увидел проблему? Дай нам знать о ней и мы ее решим!
            </p>
            <p>
                <a class="lng-repAprob btn btn-success btn-lg" href="applications/newApplication.php" role="button">Сообщить о проблеме</a>
            </p>
        </div>
    </div>

    <div class="container">
        <h2 class="lng-heading1">Последние решенные проблемы</h2>
        <br>
        <div class="gallery">
            <?php foreach ($results as $result): ?>
                <div class="img-wrapper">
                    <section>
                        <label class="lng-nameAppH h-name">Название:</label><br>
                        <label class="name">
                            <?= $result['name_application'] ?>
                        </label><br>

                        <label class="lng-descH h-desc">Описание:</label><br>
                        <label class="desc">
                            <?= $result['descripton'] ?>
                        </label><br>

                        <label class="lng-dateH h-date">Дата:</label><br>
                        <label class="n-date">
                            <?= $result['timestamp'] ?>
                        </label>

                        <div class="photo">
                            <img class="wh-img" src="<?= $result['file_path'] ?>" alt="На фото проблемы">
                        </div>
                        <div class="photo effect">
                            <img class="wh-img" src="<?= $result['file_path_proof'] ?>" alt="На фото проблема решена">
                        </div>
                    </section>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- <script src="js/lang.js"></script> -->
    <!-- <script src="js/changeLangUser.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>