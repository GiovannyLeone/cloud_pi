<?php
include_once("class.user.php");
class Profile
{
    // Criando Variaveis
    private int $idCloudCode;
    private string $name;
    private int $age;
    private string $biographyProfile;   
    private int $idLocation;   
    private int $idImage;   
    private int $idUser; 
    

    // Dados Profile

    public function setIdCloudCode(int $idCloudCode)
    {
        return $this->idCloudCode = $idCloudCode;
    }

    public function getIdCloudCode(int $idCloudCode)
    {
        return $this->idCloudCode;
    }

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

        if ( $idCountry === 1) {
            // Brasil
            if ( $idState === 1) {
                $idLocation = (int) 1;
                return $this->idLocation = $idLocation;

            } else if ($idState === 2) {
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
            if ( $idState === 1) {
                $idLocation = (int) 5;
                return $this->idLocation = $idLocation;

            } else if ($idState === 2) {
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

    public function registerProfile(string $keyHashUser)
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];

            $keyHash = $keyHashUser;

            $consultUser = $conn->prepare("SELECT id_user,user_email FROM tb_user WHERE hash = :userHash LIMIT 1");
            $consultUser->bindParam(':userHash', $keyHash, PDO::PARAM_STR);
            $consultUser->execute();

            if ($consultUser->rowCount() === 1) {
                // Pegando dados para construir Profile
                $nameProfile = $this->name;
                $ageProfile = $this->age;
                $biographyProfile = $this->biographyProfile;

                $idLocation = $this->idLocation;


                // $idImage = $this->idImage;
                // $idUser = $this->idUser;



                $existUser = $consultUser->fetch(PDO::FETCH_ASSOC);
                $userEmail = (string) $existUser['user_email'];


                $resArray["redirect"] =  "Work";
                $resArray['idLocation'] = $idLocation;
                $resArray['emailUser'] = $userEmail;

            } else {
                $resArray["error"] =  "Don´t Work";

            }

            
        }else{
            exit("fora!");
        }
        echo json_encode($resArray);
        
    } 

}