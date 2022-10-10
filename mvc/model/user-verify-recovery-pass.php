<?php
include_once('../controller/class/class.user.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
header("Content-Type: application/json");
$data = (object) json_decode(file_get_contents('php://input'), true);
$userEmail  = $data->getForgetFormEmail;
$username   = $data->getForgetFormUsername;
$users = new User;
$users->setUserEmail($userEmail);
$users->setUsername($username);
$users->verifyRecoveryPassUser();
} else {
    exit("Acesso Negado!");
}