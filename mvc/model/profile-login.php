<?php
include_once('../controller/class/class.profile.php');





$profile = new profile;
$profile->setIdUser($_SESSION['idUserSe']);
$profile->registerProfile();

