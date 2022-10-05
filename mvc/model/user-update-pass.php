<?php
include_once('../controller/class/class.user.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$userEmail      = $_POST["updateEmailUser"];
$username       = $_POST["updateLoginUser"];
$userPassword   = $_POST["updatePassUser"];
$hash           = $_POST["updateHashUser"];
$users = new User;
$users->setUserEmail($userEmail);
$users->setUsername($username);
$users->setUserPassoword($userPassword, $userEmail);
$users->setHash($userPassword, $userEmail);
$users->setUpdateHash($hash);
$users->updatePasswordUser();
} else {
    exit("Acesso Negado!");
}
