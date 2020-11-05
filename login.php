<?php
session_start();
$connection = new PDO ('mysql:host=localhost; dbname=practise_db; charset=utf8', 'root', 'Relationship7109');
$data = $connection->query('SELECT * FROM `admin`');
if ($_POST['login']) {
    foreach ($data as $info) {
        if ($_POST['login'] == $info['login'] && $_POST['pass'] == $info['pass']) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pass'] = $_POST['pass'];
            header('Location: admin.php');
        }

    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles-5.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Login for admin</title>
</head>
<body>

<div class="container ">
    <h2>Вход в админку</h2>

    <form method="POST">
        <div class="form-group">
            <input type="text" class="form-control-static" name="login" placeholder="Логин" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control-static" name="pass" placeholder="Пароль" required>
        </div>
        <button class="btn btn-primary">Отправить</button>
    </form>
</div>

</body>
</html>
