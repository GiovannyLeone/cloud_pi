<?php
include_once('../controller/class/class.profile.php');
include_once('../controller/class/class.user.php');
include_once('../controller/class/class.cloudcode.php');

$cloudCode = $_POST['codeCloud'];

// Cloud Code


$classCloudCode = new CloudCode;
$classCloudCode->setCloudCode($cloudCode);
$classCloudCode->registerCloudCode();


$profileName = $_POST['profileName'];
$profileAge = $_POST['profileAge'];
$biographyProfile = $_POST['biographyProfile'];
$idCountry = $_POST['idCountry'];
$idState = $_POST['idState'];
$pathImage = $_POST['pathImage'];
$keyHashUser = $_POST['keyIdentityUser'];

$profile = new profile;
$profile->setCloudCode($cloudCode);
$profile->setName($profileName);
$profile->setAge($profileAge);
$profile->setBiographyProfile($biographyProfile);
$profile->setIdLocation($idCountry, $idState);
// $profile->setIdImage($pathImage);
// $profile->setHash($keyHashUser);
$profile->registerProfile($keyHashUser);



