<?php
include_once('../controller/class/class.profile.php');
include_once('../controller/class/class.user.php');

$codeCloud = $_POST['codeCloud'];
$profileName = $_POST['profileName'];
$profileAge = $_POST['profileAge'];
$biographyProfile = $_POST['biographyProfile'];
$idCountry = $_POST['idCountry'];
$idState = $_POST['idState'];
$pathImage = $_POST['pathImage'];

$keyHashUser = $_POST['keyIdentityUser'];

$profile = new profile;
$profile->setName($profileName);
$profile->setAge($profileAge);
$profile->setBiographyProfile($biographyProfile);
$profile->setIdLocation($idCountry, $idState);
// $profile->setIdImage($pathImage);
// $profile->setHash($keyHashUser);
$profile->registerProfile($keyHashUser);
