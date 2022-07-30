<?php
include_once('../controller/class/user.class.php');

$username = $_POST['setFormUsername'];
$userEmail = $_POST['setFormEmail'];
$userPassword = $_POST['setFormPassword'];
$hash = "06giovannydev";
$idStatus = 2;


$users = new User;
$users->setUsername($username);
$users->setUserEmail($userEmail);
$users->setUserPassoword($userPassword);
$users->setHash($hash);
$users->setIdStatus($idStatus);
$users->registerUsers();
