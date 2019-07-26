<?php
if(!session_status()){
    session_start();
}

//require __DIR__.'../database/querybilder.php';
require '../database/querybilder.php';
require '../components/Auth.php';

$db = new querybilder();
$my_Auth = new Auth($db);
//$my_Auth->registration( 'wasdaserg@mail.ru', 'fretre');
//$result = $db->selectAll('users');
//var_dump($result);

$login = $my_Auth->login('test@mail.ru', 'password');
var_dump($login, $_SESSION);

//$logout = $my_Auth->logout();
//var_dump($logout);

$check = $my_Auth->check();
var_dump($check);

$currentuser = $my_Auth->currentuser();
var_dump($currentuser);
var_dump($currentuser['email']);

$changStatusUsers = $db->changStatusUsers(1, 1);

$getStatusUsers = $db->getStatusUsers(1);
var_dump($getStatusUsers);

$fullName = $db->fullName(1);
var_dump($fullName);

$addImg = $db->addImg(1, '/img/1.jpg');

//ТУТ ИДЕТ РОУТИНГ!
$url = $_SERVER['REQUEST_URI']; //aboutme

if($url == '/') {
    require "../index.php"; exit;
} elseif($url == '/contact') {
    echo "подключен файл contact.php"; exit;
}

echo "404 | ERROR ";