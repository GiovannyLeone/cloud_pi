<?php
include_once('../controller/class/user.class.php');

$username = $_POST['getFormUsername'];
$userPassword = $_POST['getFormPassword'];
$idStatus = 2;


$users = new User;
$users->setUsername($username);
$users->setUserEmail($username);
$users->setUserPassoword($userPassword);
$users->setIdStatus($idStatus);
$users->loginUsers();


