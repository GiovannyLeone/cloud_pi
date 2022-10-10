<?php
include_once('../controller/class.user.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header("Content-type: application/json; charset=utf8");
    $data           = (object) json_decode(file_get_contents('php://input'), true);
    $username       = $data->getFormUsername;
    $userPassword   = $data->getFormPassword;
    $users = new User;
    $users->setUsername($username);
    $users->setUserEmail($username);
    $users->setJustUserPassoword($userPassword);
    $users->loginUsers();
} else {
    exit("Acesso Negado!");
}
