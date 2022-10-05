<?php
include_once('../controller/class/class.user.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$userEmail  = $_POST["getForgetFormEmail"];
$username   = $_POST["getForgetFormUsername"];
$users = new User;
$users->setUserEmail($userEmail);
$users->setUsername($username);
$users->verifyRecoveryPassUser();
} else {
    exit("Acesso Negado!");
}