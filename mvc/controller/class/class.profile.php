<?php
// include_once("class.user.php");
 include_once("class.cloudcode.php");
class Profile extends CloudCode
{
    // Criando Variaveis
    private string $name;
    private int $age;
    private string $biographyProfile;   
    private int $idLocation;   
    private int $idImage;   
    private int $idUser; 
    

    // Dados Profile
    public function setName(string $name)
    {
        return $this->name = $name;
    }

    public function getName(string $name)
    {
        return $this->name;
    }

    public function setAge(int $age)
    {
        return $this->age = $age;
    }

    public function getAge(int $age)
    {
        return $this->age;
    }

    public function setBiographyProfile(string $biographyProfile)
    {
        return $this->biographyProfile = $biographyProfile;
    }

    public function getBiographyProfile(string $biographyProfile)
    {
        return $this->biographyProfile;
    }

    public function setIdLocation(int $idCountry, int $idState)
    {

        if ( $idCountry === 1 ) {
            // Brasil
            if ( $idState === 1 ) {
                $idLocation = (int) 1;
                return $this->idLocation = $idLocation;

            } else if ($idState === 2 ) {
                $idLocation = (int) 2;
                return $this->idLocation = $idLocation;

            }




        } else if ( $idCountry === 2 ) {
            // Argentina
            if ( $idState === 1) {
                $idLocation = (int) 3;
                return $this->idLocation = $idLocation;

            } else if ($idState === 2) {
                $idLocation = (int) 4;
                return $this->idLocation = $idLocation;
                
            }

            
        } else if ( $idCountry === 3 ) {
            // EUA
            if ( $idState === 1 ) {
                $idLocation = (int) 5;
                return $this->idLocation = $idLocation;

            } else if ($idState === 2 ) {
                $idLocation = (int) 6;
                return $this->idLocation = $idLocation;
            }
        }

    }

    public function getIdLocation(int $idCountry, int $idState)
    {
        return $this->idLocation;
    }

    public function setIdImage(int $idImage)
    {
        return $this->idImage = $idImage;
    }

    public function getIdImage(int $idImage)
    {
        return $this->idImage;
    }

    public function setIdUser(int $idUser)
    {
        return $this->idUser = $idUser;
    }

    public function getIdUser(int $idUser)
    {
        return $this->idUser;
    }

    public function setPathImage(string $pathImage)
    {
        return $this->pathImage = $pathImage;
    }

    public function getPathImage(string $pathImage)
    {
        return $this->pathImage;
    }

    public function setAlternativeImage(string $alternativeImage)
    {
        if ($alternativeImage === "profile/") {
            $alternativeImage = 'Profile Photo';
            return $this->alternativeImage = $alternativeImage;
        } else if ($alternativeImage === "posts/") {
            $alternativeImage = 'Publication';
            return $this->alternativeImage = $alternativeImage;

        } else{
            $alternativeImage = '';
            return $this->alternativeImage = $alternativeImage;
        }
    }

    public function getAlternativeImage(string $alternativeImage)
    {
        return $this->alternativeImage;
    }

    public function setIdTypeImage(int $idTypeImage)
    {
        return $this->idTypeImage = $idTypeImage;
    }

    public function getIdTypeImage(int $idTypeImage)
    {
        return $this->idTypeImage;
    }


    public function registerProfile(string $keyHashUser)
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];

            $keyHash = $keyHashUser;

            $consultUser = $conn->prepare("SELECT id_user FROM tb_user WHERE hash = :userHash LIMIT 1");
            $consultUser->bindParam(':userHash', $keyHash, PDO::PARAM_STR);
            $consultUser->execute();

            if ($consultUser->rowCount() === 1) {
                // Pegando dados para construir Profile
                $nameProfile = $this->name;
                $ageProfile = $this->age;
                $biographyProfile = $this->biographyProfile;
                $idLocation = $this->idLocation;
                

                $existUser = $consultUser->fetch(PDO::FETCH_OBJ);
                $idUser = (int) $existUser->id_user;

                $resArray['idLocation'] = $idLocation;
                if ($nameProfile && $ageProfile && $biographyProfile && $idLocation && $idUser) {
                    
                    $idCloudCode = (int) $this->reqIdCloudCode();

                    $pathImage          = (string) $this->pathImage;
                    $alternativeImage   = (string) $this->alternativeImage;
                    $idTypeImage        = (int)    $this->idTypeImage;
                    $idImage            = (int) $this->reqIdMedia($pathImage, $alternativeImage, $idTypeImage);
                    

                    $consultIdCloudCode = $conn->prepare("SELECT id_cloud_code FROM tb_cloud_code WHERE id_cloud_code = :idCloudCode LIMIT 1");
                    $consultIdCloudCode->bindParam(':idCloudCode', $idCloudCode, PDO::PARAM_STR);
                    $consultIdCloudCode->execute();

                    $existCloudCode = $consultIdCloudCode->fetch(PDO::FETCH_OBJ);
                    $idCloudCode = (int) $existCloudCode->id_cloud_code;

                    if ($idCloudCode) {
                        $insertProfile = $conn->prepare("INSERT INTO tb_profile (id_cloud_code, name, age, biography_profile, id_location, id_image, id_user) 
                        VALUES(
                        :cloudCode,
                        :nameProfile,
                        :ageProfile,
                        :bioProfile,
                        :idlocation,
                        :idImage,
                        :idUser
                        )");
                        $insertProfile->bindParam(':cloudCode', $idCloudCode, PDO::PARAM_INT);
                        $insertProfile->bindParam(':nameProfile', $nameProfile, PDO::PARAM_STR);
                        $insertProfile->bindParam(':ageProfile', $ageProfile, PDO::PARAM_INT);
                        $insertProfile->bindParam(':bioProfile', $biographyProfile, PDO::PARAM_STR);
                        $insertProfile->bindParam(':idlocation', $idLocation, PDO::PARAM_INT);
                        $insertProfile->bindParam(':idImage', $idImage, PDO::PARAM_INT);
                        $insertProfile->bindParam(':idUser', $idUser, PDO::PARAM_INT);
                        $insertProfile->execute();
                    }
                }
            } else {
                $resArray["error"] =  "Don´t Work";
            }
        }else{
            exit("fora!");
        }
        echo json_encode($resArray);
        
    } 

}