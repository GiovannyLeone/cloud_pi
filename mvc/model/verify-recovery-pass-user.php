<?php
include_once('../controller/class/class.user.php');


$baseURL = 'http://' . $_SERVER['SERVER_NAME'];
$baseURL .= 'cloud_pi';

$userEmail = $_POST["getForgetFormEmail"];
$username = $_POST["getForgetFormUsername"];

$users = new User;
$users->setUserEmail($userEmail);
$users->setUsername($username);
$users->verifyRecoveryPassUser();
