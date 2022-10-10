<?php
include_once('../controller/class/class.user.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header("Content-Type: application/json");
    $data = (object) json_decode(file_get_contents('php://input'), true);
    $username       = $data->setFormUsername;
    $userEmail      = $data->setFormEmail;
    $userPassword   = $data->setFormPassword;
    $users = new User;
    $users->setUsername($username);
    $users->setUserEmail($userEmail);
    $users->setUserPassoword($userPassword, $userEmail);
    $users->setHash($userPassword, $userEmail);
    $users->registerUsers();
} else {
    exit("Acesso Negado!");
}
