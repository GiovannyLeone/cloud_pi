<?php
include_once('../controller/class.profile.php');
include_once('../controller/class.user.php');
include_once('../controller/class.cloudcode.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header("Content-type: application/json; charset=utf8");
    $data               = (object) json_decode(file_get_contents('php://input'), true);
    $cloudCode          = $data->codeCloud;
    $profileName        = $data->profileName;
    $profileAge         = $data->profileAge;
    $biographyProfile   = $data->biographyProfile;
    $idCountry          = $data->idCountry;
    $idState            = $data->idState;
    $pathImage          = $data->pathImage;
    $extensionImg       = $data->extensionImg;
    $alternativeImage   = $data->alternativeImage;
    $keyHashUser        = $data->keyIdentityUser;

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
