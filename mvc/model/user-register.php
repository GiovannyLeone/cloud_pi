<?php
include_once('../controller/class/class.user.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $username       = $_POST['setFormUsername'];
    $userEmail      = $_POST['setFormEmail'];
    $userPassword   = $_POST['setFormPassword'];
    $users = new User;
    $users->setUsername($username);
    $users->setUserEmail($userEmail);
    $users->setUserPassoword($userPassword, $userEmail);
    $users->setHash($userPassword, $userEmail);
    $users->registerUsers();
} else {
    exit("Acesso Negado!");
}
