<?php
//function deleteTask($data)
//{
//    $pdo = new PDO('mysql:host=192.168.10.10; dbname=notepad_crud; charset=utf8', 'homestead', 'secret');
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = 'delete from tasks where id=:id';
//    $stmt = $pdo->prepare($sql);
//    $result = $stmt->execute($data);
////var_dump($result);
//}

//deleteTask($_GET);
$id=$_GET['id'];
require 'database/querybilder.php';
$my_deleteOne = new querybilder();
$my_deleteOne->deleteOne('tasks', $id);
HEADER('Location: /index.php');