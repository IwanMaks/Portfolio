<?php
session_start();

if (!$_SESSION['login'] || !$_SESSION['pass']) {
    header('Location: login.php');
    die();
}

if ($_POST['unlogin']) {
    session_destroy();
    header('Location: login.php');
}

if (count($_POST) > 0) {
    header('Location: admin.php');
}

$connection = new PDO('mysql:host=localhost; dbname=practise_db; charset=utf8', 'root', 'Relationship7109');
$data = $connection->query("SELECT * FROM comments WHERE `check`='uncheck' ORDER by date DESC");

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
        <title>Admin</title>
    </head>
    <body>
    <div class="container">
        <h1>Админка злобного админа</h1>
        <hr>

        <form method="POST" action="admin.php">
            <? foreach ($data as $comment) { ?>
                <div class="form-group">
                    <select name="<?= $comment['id']?>" id="<?= $comment['id']?>">
                        <option value="check">ОК</option>
                        <option value="rejected">ОТКЛОНИТЬ</option>
                    </select>
                    <label for="<?= $comment['id']?>">
                        "<?= $comment['name'] . '" оставил комментарий "' . $comment['comment'] . "\"<br/>" ?>
                    </label>
                </div>
            <? } ?>
            <button class="btn btn-primary" type="submit">Модерировать</button>
        </form>

        <hr>
        <form method="POST">
            <input type="hidden" name="unlogin" value="unlogin">
            <button type="submit" class="btn btn-danger">Выйти из админки</button>
        </form>
    </div>
    </body>
</html>


<?php
foreach ($_POST as $num=>$checked) {
    if ($checked == 'check') {
        $connection->query("UPDATE `comments` SET `check`='check' WHERE id=$num");
    } else {
        $connection->query("UPDATE `comments` SET `check`='rejected' WHERE id=$num");
    }
}