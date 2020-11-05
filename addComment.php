<?php
$connection = new PDO('mysql:host=localhost; dbname=practise_db; charset=utf8', 'root', 'Relationship7109');
if ($_POST['comment']) {
    $newComment = htmlspecialchars(trim($_POST['comment']));
    $newName = htmlspecialchars(trim($_POST['name']));

    if (!$newComment || !$newName) {
        header('Location: index.php');
        die();
    }

    $safe = $connection->prepare("INSERT INTO `comments` SET `name`=:username, comment=:text");
    $arr = ['username' => $newName, 'text' => $newComment];
    $safe->execute($arr);

}

header('Location: index.php');