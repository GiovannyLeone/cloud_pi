<?php
require('../db/connect.php');
include_once('../controller/class/cadastrar_user.class.php');

$username = $_POST['username'];
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];
$hash = "06giovannydev";
$idStatus = 2;




$users = new User;
$users->setUsername($username);
$users->setUserEmail($userEmail);
$users->setUserPassoword($userPassword);
$users->setHash($hash);
$users->setIdStatus($idStatus);
