<?php
include_once('../controller/class/class.profile.php');

$keyHashUser = $_POST['identityUser'];


$profile = new profile;
$profile->setHash($keyHashUser);
$profile->registerProfile();

