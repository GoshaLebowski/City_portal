<?php
session_start();
if (!$_SESSION['admin'] ?? '') {
    header('Location: ../index.php');
}

require_once "../db/db.php";

$id_message = $_POST['id_select'];

$results = mysqli_query($connect, "SELECT * FROM `applications` INNER JOIN `categories` 
ON categories.id_categories = applications.id_categories INNER JOIN `application_status` 
ON application_status.id_application_status = applications.id_application_status INNER JOIN `users` 
ON users.id_user = applications.id_user
WHERE id = '$id_message'");

$results = mysqli_fetch_assoc($results);

$results_status = mysqli_query($connect, 'SELECT * FROM application_status');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявок</title>
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
                <a class="navbar-brand" href="#">Городской портал</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
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
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="tableApplication">
        <div>
            <h2>Редактировать заявку</h2>
            <form name="applications" onsubmit="return volidateFormUpdateSelect()" action="message_update.php?id=<?= $results['id'] ?>" method="POST">
                <h4>Заявка пользователя: <?= $results['name']?></h4>
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
                            <p><?= $results['id'] ?></p>
                        </td>  
                        <td valign="top">
                            <p><?= $results['name_application'] ?></p>
                        </td>    
                    
                        <td valign="top">
                            <p><?= $results['descripton'] ?></p>
                        </td>
                    
                        <td valign="top">
                            <p><?= $results['categories'] ?></p>
                        </td>
                    
                        <td class="img-td">
                            <img class="imgApplication" src="../<?= $results['file_path'] ?>" alt="">
                        </td>

                        <td class="img-td">
                            <img class="imgApplication" src="../<?= $results['file_path_proof'] ?>" alt="">
                        </td>
                    
                        <td valign="top">
                            <p><?= $results['status'] ?></p>
                        </td>
                
                        <td valign="top">
                            <p><?= $results['timestamp'] ?></p>
                        </td>
                    </tr>
                </table>
                <div>
                    <select name="updateSelect">
                        <option value="0" hidden disabled selected>Выберите статус заявки</option>
                        <?php foreach ($results_status as $key => $result_status) : ?>
                        <option value= <?= $result_status['id_application_status'] ?>><?= $result_status['status'] ?></option>
                        <?php endforeach; ?>  
                    </select>
                    <div class="error" id="updateSelectErr"></div>
                    <input class="btn-primary btn up-btn" type="submit" value="Изменить">
                    <input formaction="removeApplication.php?id=<?= $results['id'] ?>" class="btn-primary btn up-btn" type="submit" value="Удалить">
                 </div>
            </form>
            
            <form action="uploadPhotoProof.php?id=<?= $results['id'] ?>" method="post" enctype="multipart/form-data">
                <div>
                    <input class="btn-lg btn" name="file_proof" type="file">
                    <input class="btn-primary btn btup-mb" type="submit" value="Загрузить фото докозательство">
                </div>
            </form>
            
            <button class="btn-primary btn" onclick="location.href = 'admin.php'">Назад</button>

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