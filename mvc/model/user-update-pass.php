<?php
include_once('../controller/class.user.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header("Content-type: application/json; charset=utf8");
    $data           = (object) json_decode(file_get_contents('php://input'), true);
    $userEmail      = $data->updateEmailUser;
    $username       = $data->updateLoginUser;
    $userPassword   = $data->updatePassUser;
    $hash           = $data->updateHashUser;
    $users = new User;
    $users->setUserEmail($userEmail);
    $users->setUsername($username);
    $users->setUserPassoword($userPassword, $userEmail);
    $users->setHash($userPassword, $userEmail);
    $users->setAccessToken($userPassword, $userEmail);
    $users->setUpdateHash($hash);
    $users->updatePasswordUser();
} else {
    exit("Acesso Negado!");
}
