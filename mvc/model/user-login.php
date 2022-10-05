<?php
include_once('../controller/class/class.user.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$username = $_POST['getFormUsername'];
$userPassword = $_POST['getFormPassword'];
$users = new User;
$users->setUsername($username);
$users->setUserEmail($username);
$users->setJustUserPassoword($userPassword);
$users->loginUsers();
} else {
    exit("Acesso Negado!");
}

