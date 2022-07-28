<?php
require('../db/connect.php');
include_once('../controller/class/cadastrar_user.class.php');

$username = $_POST['getFormUsername'];
$userPassword = $_POST['getFormPassword'];
$idStatus = 2;

echo $username;
echo $userPassword;




$users = new User;
$users->setUsername($username);
$users->setUserEmail($username);
$users->setUserPassoword($userPassword);
$users->setIdStatus($idStatus);
$users->getUsers();

if ($users->getUsers() === TRUE) {
    return  header("Location: ../../public/feed.html");
}
