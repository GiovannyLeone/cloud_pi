<?php
include_once('../controller/class/class.user.php');


// $baseURL = 'http://' . $_SERVER['SERVER_NAME'];
// $baseURL .= 'cloud_pi';

$userEmail = $_POST["updateEmailUser"];
$username = $_POST["updateLoginUser"];
$userPassword = $_POST["updatePassUser"];
$hash = $_POST["updateHashUser"];

$users = new User;
$users->setUserEmail($userEmail);
$users->setUsername($username);
$users->setUserPassoword($userPassword);
$users->setHash($hash);
$users->updatePasswordUser();
