<?php
session_start();
require_once("../db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: ../index.php');
}

$idUser = $_SESSION['user']['id_user'];
$clearMessages = "";

$results = mysqli_query($connect, "SELECT * FROM applications inner join categories on applications.id_categories = categories.id_categories 
inner join application_status on application_status.id_application_status = applications.id_application_status WHERE id_user = '$idUser' ORDER BY applications.id desc");
if (!mysqli_num_rows($results) > 0) {
    $clearMessages = '<p class="noApplications">Извените, но у вас не одной заявки</p>';
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title class="lng-title">Просмотр заявок</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-noApplication.css">
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
                    <li><a href="../user.php" class="lng-main">Главная</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <?= $_SESSION['user']['name'] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href=" " class="lng-myApp">Мои заявки</a></li>
                            <li><a href="newApplication.php" class="lng-newApp">Новая заявка</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../registration and authorization/logout.php" class="lng-exit">Выход</a></li>
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

    <div class="tableApplication">
        <form method="post">
            <?= $clearMessages ?>
            <?php foreach ($results as $key => $result): ?>
                <table id="border_example" width="600">
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th>Фото</th>
                        <th>Фото Доказательство</th>
                        <th>Статус</th>
                        <th>Дата</th>
                    </tr>
                    <tr>
                        <td valign="top">
                            <p>
                                <?= $result['name_application'] ?>
                            </p>
                        </td>

                        <td valign="top">
                            <p>
                                <?= $result['descripton'] ?>
                            </p>
                        </td>

                        <td valign="top">
                            <p>
                                <?= $result['categories'] ?>
                            </p>
                        </td>

                        <td class="img-td">
                            <img class="imgApplication" src="../<?= $result['file_path'] ?>" alt="">
                        </td>

                        <td class="img-td">
                            <img class="imgApplication" src="../<?= $result['file_path_proof'] ?>" alt="">
                        </td>

                        <td valign="top">
                            <p>
                                <?= $result['status'] ?>
                            </p>
                        </td>

                        <td valign="top">
                            <p>
                                <?= $result['timestamp'] ?>
                            </p>
                        </td>
                    </tr>
                </table>
                <button type="submit" formaction="removeApplication.php?applica_id=<?= $result['id'] ?>"
                    class="lng-del btn btn-primary btn-lg reg-btn">Удалить</button>
                <div class="error-php">
                    <?php
                    if ($_SESSION['message'] ?? '') {
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

    <!-- <script src="../js/lang.js"></script> -->
    <!-- <script src="../js/changeLangWithOfApp.js"></script> -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>