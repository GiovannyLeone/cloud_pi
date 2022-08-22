<?php
include_once('../controller/class/user.class.php');


$baseURL = 'http://' . $_SERVER['SERVER_NAME'];
$baseURL .= 'cloud_pi';

$userEmail = $_POST["getForgetFormUsername"];
$username = $_POST["getForgetFormUsername"];

$users = new User;
$users->setUserEmail($userEmail);
$users->setUsername($username);
$users->recoveryPassUser();
