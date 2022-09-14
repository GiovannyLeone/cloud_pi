<?php
include_once('../controller/class/class.profile.php');


$idUser = $GLOBALS["idUser"];
print_r($GLOBALS["idUser"]);
print_r($_SESSION["idUserSe"]);


$profile = new profile;
$profile->setIdUser($idUser);
$profile->registerProfile();

