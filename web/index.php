<?php
require '../vendor/autoload.php';

use App\querybilder;
use App\Auth as Myalias;
use Delight\Auth\Auth;


$db = new querybilder();
$My_alias = new Myalias($db);
//$My_alias->check();
$db = $db->pdo;
//exit();

$auth = new Auth($db);

$_POST['email']="test5@mail.ru";
$_POST['password']="secret";
$_POST['username']=null;

////Registration (sign up)
//try {
//    $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'],
//        function ($selector, $token) {
//                                        echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
//                                     }
//    );
//    echo 'We have signed up a new user with the ID ' . $userId;
//}
//catch (\Delight\Auth\InvalidEmailException $e) {
//    die('Invalid email address');
//}
//catch (\Delight\Auth\InvalidPasswordException $e) {
//    die('Invalid password');
//}
//catch (\Delight\Auth\UserAlreadyExistsException $e) {
//
//    die('User already exists');
//}
//catch (\Delight\Auth\TooManyRequestsException $e) {
//    die('Too many requests');
//}
/////////////////////////



//////////Login (sign in)
//try {
//    $auth->login($_POST['email'], $_POST['password']);
//
//    echo 'User is logged in';
//}
//catch (\Delight\Auth\InvalidEmailException $e) {
//    die('Wrong email address');
//}
//catch (\Delight\Auth\InvalidPasswordException $e) {
//    die('Wrong password');
//}
//catch (\Delight\Auth\EmailNotVerifiedException $e) {
//    die('Email not verified');
//}
//catch (\Delight\Auth\TooManyRequestsException $e) {
//    die('Too many requests');
//}
///////////////////




//Email verification
//Extract the selector and token from the URL that the user clicked on in the verification email.

//try {
////    $url = 'https://www.example.com/verify_email?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
//    $auth->confirmEmail("AtqKwDR3SeBAXenc", "iMdT6rjUEV4-Wqss");
//
//    echo 'Email address has been verified';
//}
//catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
//    die('Invalid token');
//}
//catch (\Delight\Auth\TokenExpiredException $e) {
//    die('Token expired');
//}
//catch (\Delight\Auth\UserAlreadyExistsException $e) {
//    die('Email address already exists');
//}
//catch (\Delight\Auth\TooManyRequestsException $e) {
//    die('Too many requests');
//}
/////////////////////////////////////



////Re-sending confirmation requests
try {
    $selector = "hHCB9RZdgX6HmttQ";
    $token = "eA1xEbo6nPx8ScCY";

    $auth->resendConfirmationForEmail($_POST['email'], function ($selector, $token) {
        echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
    });

    echo 'The user may now respond to the confirmation request (usually by clicking a link)';
}
catch (\Delight\Auth\ConfirmationRequestNotFound $e) {
    die('No earlier request found that could be re-sent');
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    die('There have been too many requests -- try again later');
}
///////////////////////////////////////



//Logout
$auth->logOut();

// or

try {
    $auth->logOutEverywhere();
}
catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
}
/////////////////////////////////////
exit();













if(!session_status()){
    session_start();
}

//require __DIR__.'../database/querybilder.php';
//require '../database/querybilder.php';
//require '../components/Auth.php';
//
//$db = new querybilder();
//$my_Auth = new Auth($db);
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