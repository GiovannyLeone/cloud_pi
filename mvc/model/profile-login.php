<?php
include_once('../controller/class/class.profile.php');
include_once('../controller/class/class.user.php');
include_once('../controller/class/class.cloudcode.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$cloudCode = $_POST['codeCloud'];
$profileName = $_POST['profileName'];
$profileAge = $_POST['profileAge'];
$biographyProfile = $_POST['biographyProfile'];
$idCountry = $_POST['idCountry'];
$idState = $_POST['idState'];
$pathImage = $_POST['pathImage'];
$extensionImg = $_POST['extensionImg'];
$alternativeImage = $_POST['alternativeImage'];
$keyHashUser = $_POST['keyIdentityUser'];

// Cloud Code


$classCloudCode = new CloudCode;
$classCloudCode->setCloudCode($cloudCode);
$classCloudCode->registerCloudCode();

$classMedia = new Media;
$classMedia->setPathImage($pathImage);
$classMedia->setAlternativeImage($alternativeImage);
$classMedia->setIdTypeImage($extensionImg);
$classMedia->addMedia();


$profile = new profile;
$profile->setPathImage($pathImage);
$profile->setAlternativeImage($alternativeImage);
$profile->setIdTypeImage($extensionImg);

$profile->setCloudCode($cloudCode);
$profile->setName($profileName);
$profile->setAge($profileAge);
$profile->setBiographyProfile($biographyProfile);
$profile->setIdLocation($idCountry, $idState);
// $profile->setIdImage($pathImage);
// $profile->setHash($keyHashUser);
$profile->registerProfile($keyHashUser);
} else {
    exit("Acesso Negado!");
}




