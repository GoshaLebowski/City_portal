<?php
session_start();
if (!$_SESSION['admin'] ?? '') {
    header('Location: ../index.php');
}

require_once "../db/db.php";

$categories = mysqli_query($connect, 'SELECT * FROM `categories`');
$results = mysqli_query($connect, "SELECT * FROM `applications` 
INNER JOIN `categories` ON categories.id_categories = applications.id_categories 
INNER JOIN `application_status` ON application_status.id_application_status = applications.id_application_status 
INNER JOIN `users` ON users.id_user = applications.id_user WHERE status = 'Новая'");
if (!mysqli_num_rows($results) > 0) {
    $clearMessages = '<p class="noApplications">К сожелению не одной новой заявки</p>';
}

$results_status = mysqli_query($connect, 'SELECT * FROM application_status');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-noApplication.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Городской портал</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <?= $_SESSION['admin']['login'] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logoutAdmin.php">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="applicationManagement">
        <div>
            <h2>Управление категории</h2>
            <form name="inputCategories" onsubmit="return volidateFormInputCategories()" action="addingAcategory.php" method="post">
                <div class="text-field text-field_floating-3">
                    <input class="text-field__input" type="text" name="name" id="name" placeholder="Добавить категорию">
                    <label class="text-field__label" for="name">Добавить категорию</label>
                </div>
                <div class="error" id="inputCategoriesErr"></div>
                <input class="btn-primary btn reg-btn btn-c" type="submit" value="Добавить">
            </form>
            <form name="categoriseSelect" onsubmit="return volidateFormCategories()" action="categories.php" method="post">
                <div class="block">
                    <label class="applicationLabel">Категория:</label>
                    <select id="id_categories" name="id_categories" class="selectionOfApplications">
                        <option value="0" hidden disabled selected>Выбор категории...</option>
                        <?php foreach ($categories as $key => $category): ?>
                            <option value=<?= $category['id_categories'] ?>>[ID: <?= $category['id_categories'] ?>] <?= $category['categories'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="error" id="categoriesErr"></div>
                <input class="btn-primary btn reg-btn btn-c" type="submit" value="Выбрать">
            </form>
        </div>
    </div>

    <div class="applicationManagement">
        <div>   
            <h2 class="headApp">Рассмотрение заявок</h2>
            <?= $clearMessages ?? '' ?>
            <?php foreach($results as $result):?>
            <form name="applications" onsubmit="return volidateFormUpdateSelect()" action="message_update.php?id=<?= $result['id'] ?>" method="POST">
                <h4>Заявка пользователя: <?= $result['name']?></h4>
                <table id="border_example" width="600">
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th>Фото</th>
                        <th>Фото докозательство</th>
                        <th>Статус</th>
                        <th>Дата</th>
                    </tr>
                    <tr>
                        <td valign="top">
                            <p><?= $result['id'] ?></p>
                        </td>  
                        <td valign="top">
                            <p><?= $result['name_application'] ?></p>
                        </td>    
                    
                        <td valign="top">
                            <p><?= $result['descripton'] ?></p>
                        </td>
                    
                        <td valign="top">
                            <p><?= $result['categories'] ?></p>
                        </td>
                    
                        <td class="img-td">
                            <img class="imgApplication" src="../<?= $result['file_path'] ?>" alt="">
                        </td>

                        <td class="img-td">
                            <img class="imgApplication" src="../<?= $result['file_path_proof'] ?>" alt="">
                        </td>
                    
                        <td valign="top">
                            <p><?= $result['status'] ?></p>
                        </td>
                
                        <td valign="top">
                            <p><?= $result['timestamp'] ?></p>
                        </td>
                    </tr>
                </table>
                <div>
                    <select id="updateSelect" name="updateSelect">
                        <option value="0" hidden disabled selected>Выберите статус заявки</option>
                        <?php foreach ($results_status as $key => $result_status) : ?>
                        <option value= <?= $result_status['id_application_status'] ?>><?= $result_status['status'] ?></option>
                        <?php endforeach; ?>  
                    </select>
                    <input class="btn-primary btn up-btn" type="submit" value="Изменить">
                    <input formaction="removeApplication.php?id=<?= $result['id'] ?>" class="btn-primary btn up-btn" type="submit" value="Удалить">
                </div>
            </form>
            
            <form action="uploadPhotoProof.php?id=<?= $result['id'] ?>" method="post" enctype="multipart/form-data">
                <div>
                    <input class="btn-lg btn" name="file_proof" type="file">
                    <input class="btn-primary btn btup-mb" type="submit" value="Загрузить фото докозательство">
                </div>
            </form>
            <?php endforeach; ?>

            <div class="error" id="updateSelectErr"></div>
            <div class="error-php">
                <?php
                    if ($_SESSION['message'] ?? '') {
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                ?>
            </div>
        </div>
    </div>

    <script src="../js/admin.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>