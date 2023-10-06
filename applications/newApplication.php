<?php
session_start();
require_once("../db/db.php");
if (!$_SESSION['user'] ?? '') {
    header('Location: ../index.php');
}

$_SESSION['date'] = $date = date('d.m.Y');

$query = "SELECT * FROM `categories`";
$categories = mysqli_query($connect, $query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title class="lng-title">Создать заявку</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-noApplication.css">
    <link rel="stylesheet" href="../css/style-application.css">
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
                            <li><a href="withdrawalOfApplications.php" class="lng-myApp">Мои заявки</a></li>
                            <li class="active"><a href="" class="lng-newApp">Новая заявка</a></li>   
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

    <div class="body-form">
        <main>
            <form name="applicationForm" onsubmit="return volidateForm()" action="dbApplication.php" method="post" enctype="multipart/form-data">
                <div>
                    <h3 class="lng-heading header">Создание заявки</h3>
                </div>
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="text" name="name" placeholder="Название">
                    <label class="lng-nameApp text-field__label" for="name">Название</label>
                    <div class="error" id="nameErr"></div>
                </div>
                <div class="textarea-field textarea-field_floating-3">
                    <textarea class="textarea-field__input" name="description" rows="4"
                        placeholder="Описание" maxlength="300"></textarea>
                    <label class="lng-desc textarea-field__label" for="description">Описание</label>
                    <div class="error" id="descriptionErr"></div>
                </div>
                <div class="select">
                    <select id="standard-select" name="categories">
                        <option value="" class="lng-choosAcat" hidden disabled selected>Выберите категорию...</option>
                        <?php while($category = mysqli_fetch_array($categories)):;?>
                        <option value="<?php echo $category[0];?>"><?php echo $category[1];?></option>
                        <?php endwhile;?>
                    </select>
                    <div class="error" id="categoriesErr"></div>
                </div>
                <div>
                    <input class="btn-lg btn" name="file" type="file">
                    <div class="error" id="fileErr"></div>
                </div>
                <div>
                    <span class="date">
                        <?php
                        echo $_SESSION['date'];
                        ?>
                    </span>
                </div>
                <div class="reg-btn">
                    <button class="lng-subAnApp btn btn-primary btn-lg" type="submit">Подать заявку</button>
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
    
    <!-- <script src="../js/lang.js"></script> -->
    <!-- <script src="../js/changeLangNewApp.js"></script> -->
    <script src="../js/application.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>