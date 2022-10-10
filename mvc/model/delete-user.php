<?php
include_once('../controller/class.user.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header("Content-type: application/json; charset=utf8");
    $data           = (object) json_decode(file_get_contents('php://input'), true);
    $keyIdDelete    = $data->getKeyDelete;

    $deleteUser = new User;
    $deleteUser->deleteUser($keyIdDelete);


} else {
    exit("Acesso Negado!");
}

