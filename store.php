<?php
//$pdo = new PDO('mysql:host=192.168.10.10; dbname=notepad_crud; charset=utf8', 'homestead', 'secret');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$sql='insert into tasks(title, content) values (:title, :content)';
//$stmt=$pdo->prepare($sql);
////$stmt->bindParam('title',$_POST['title']);
////$stmt->bindParam(':content', $_POST['content']);
//$result=$stmt->execute($_POST);
////var_dump($result);

require 'database/querybilder.php';
$my_addTask = new querybilder();
$my_addTask->add('tasks', $_POST);


//addTask($_POST);
header("Location: /index.php"); exit();