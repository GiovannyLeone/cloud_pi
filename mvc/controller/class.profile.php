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
    private int $idMedia;   
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

    public function setIdMedia(int $idMedia)
    {
        return $this->idMedia = $idMedia;
    }

    public function getIdMedia(int $idMedia)
    {
        return $this->idMedia;
    }

    public function setIdUser(int $idUser)
    {
        return $this->idUser = $idUser;
    }

    public function getIdUser(int $idUser)
    {
        return $this->idUser;
    }

    public function setPathMedia(string $pathMedia)
    {
        return $this->pathMedia = $pathMedia;
    }

    public function getPathMedia()
    {
        return $this->pathMedia;
    }

    public function setAlternativeMedia(string $alternativeMedia)
    {
        if ($alternativeMedia === "profile/") {
            $alternativeMedia = 'Profile Photo';
            return $this->alternativeMedia = $alternativeMedia;
        } else if ($alternativeMedia === "posts/") {
            $alternativeMedia = 'Publication';
            return $this->alternativeMedia = $alternativeMedia;

        } else{
            $alternativeMedia = '';
            return $this->alternativeMedia = $alternativeMedia;
        }
    }

    public function getAlternativeMedia()
    {
        return $this->alternativeMedia;
    }

    public function setIdTypeMedia(int $idTypeMedia)
    {
        return $this->idTypeMedia = $idTypeMedia;
    }

    public function getIdTypeMedia()
    {
        return $this->idTypeMedia;
    }


    public function registerProfile(string $keyIdUser)
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = (object) [];

            $keyUser = (string) $keyIdUser;
            $consultUser = $conn->prepare("SELECT id_user FROM tb_user WHERE access_token = :keyUser LIMIT 1");
            $consultUser->bindParam(':keyUser', $keyUser, PDO::PARAM_STR);
            $consultUser->execute();

            if ($consultUser->rowCount() === 1) {
                // Pegando dados para construir Profile
                $nameProfile        = $this->name;
                $ageProfile         = $this->age;
                $biographyProfile   = $this->biographyProfile;
                $idLocation         = $this->idLocation;
                

                $existUser  = $consultUser->fetch(PDO::FETCH_OBJ);
                $idUser     = (int) $existUser->id_user;

                $resArray->idLocation = $idLocation;
                if ($nameProfile && $ageProfile && $biographyProfile && $idLocation && $idUser) {
                    
                    $idCloudCode = (int) $this->reqIdCloudCode();

                    $pathMedia          = (string) $this->pathMedia;
                    $alternativeMedia   = (string) $this->alternativeMedia;
                    $idTypeMedia        = (int)    $this->idTypeMedia;
                    $idMedia            = (int) $this->reqIdMedia($pathMedia, $alternativeMedia, $idTypeMedia);
                    

                    $consultIdCloudCode = $conn->prepare("SELECT id_cloud_code FROM tb_cloud_code WHERE id_cloud_code = :idCloudCode LIMIT 1");
                    $consultIdCloudCode->bindParam(':idCloudCode', $idCloudCode, PDO::PARAM_INT);
                    $consultIdCloudCode->execute();

                    $existCloudCode = $consultIdCloudCode->fetch(PDO::FETCH_OBJ);
                    $idCloudCode = (int) $existCloudCode->id_cloud_code;

                    if ($idCloudCode) {
                        $insertProfile = $conn->prepare("INSERT INTO tb_profile (id_cloud_code, name, age, biography_profile, id_location, id_Media, id_user) 
                        VALUES(
                        :cloudCode,
                        :nameProfile,
                        :ageProfile,
                        :bioProfile,
                        :idlocation,
                        :idMedia,
                        :idUser
                        )");
                        $insertProfile->bindParam(':cloudCode', $idCloudCode, PDO::PARAM_STR);
                        $insertProfile->bindParam(':nameProfile', $nameProfile, PDO::PARAM_STR);
                        $insertProfile->bindParam(':ageProfile', $ageProfile, PDO::PARAM_INT);
                        $insertProfile->bindParam(':bioProfile', $biographyProfile, PDO::PARAM_STR);
                        $insertProfile->bindParam(':idlocation', $idLocation, PDO::PARAM_INT);
                        $insertProfile->bindParam(':idMedia', $idMedia, PDO::PARAM_INT);
                        $insertProfile->bindParam(':idUser', $idUser, PDO::PARAM_INT);
                        $insertProfile->execute();
                        $resArray->redirect = TRUE;
                    }
                }
            } else {
                $resArray->error =  "Don´t Work";
            }
        }else{
            exit("fora!");
        }
        echo json_encode($resArray);
        
    } 

}