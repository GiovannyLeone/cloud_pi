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
    $pathMedia          = $data->pathImage;
    $extensionImg       = $data->extensionImg;
    $alternativeMedia   = $data->alternativeImage;
    $keyIdUser          = $data->keyIdentityUser;

    // Cloud Code


    $classCloudCode = new CloudCode;
    $classCloudCode->setCloudCode($cloudCode);
    $classCloudCode->registerCloudCode();

    $classMedia = new Media;
    $classMedia->setPathMedia($pathMedia);
    $classMedia->setAlternativeMedia($alternativeMedia);
    $classMedia->setIdTypeMedia($extensionImg);
    $classMedia->addMedia();


    $profile = new profile;
    $profile->setPathMedia($pathMedia);
    $profile->setAlternativeMedia($alternativeMedia);
    $profile->setIdTypeMedia($extensionImg);

    $profile->setCloudCode($cloudCode);
    $profile->setName($profileName);
    $profile->setAge($profileAge);
    $profile->setBiographyProfile($biographyProfile);
    $profile->setIdLocation($idCountry, $idState);
    // $profile->setIdMedia($pathMedia);
    // $profile->setHash($keyHashUser);
    $profile->registerProfile($keyIdUser);
} else {
    exit("Acesso Negado!");
}
