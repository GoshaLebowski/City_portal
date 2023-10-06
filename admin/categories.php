<?php
session_start();
if (!$_SESSION['admin'] ?? '') {
    header('Location: ../index.php');
}

require_once "../db/db.php";

$id_categories = $_POST['id_categories'];

$categories = mysqli_query($connect, "select * from categories where id_categories = '$id_categories'");

$categories = mysqli_fetch_assoc($categories);
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

    <div class="applicationManagement">
        <div>
            <h2>Категория</h2>
            <form method="post">
                <table id="border_example" width="600">
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                    </tr>
                    <tr>
                        <td valign="top">
                            <p><?= $categories['id_categories'] ?></p>
                        </td>  
                        <td valign="top">
                            <p><?= $categories['categories'] ?></p>
                        </td>    
                    </tr>
                </table>
                <input type="submit" formaction="removeCategory.php?id_categories=<?= $categories['id_categories'] ?>" class="btn btn-primary btn-lg reg-btn" value="Удалить">
            </form>
            <!-- <button class="btn-primary btn" onclick="location.href = 'admin.php'">Назад</button> -->
        </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>