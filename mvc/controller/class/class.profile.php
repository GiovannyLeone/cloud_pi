<?php
include_once("class.user.php");
class Profile 
{
    // Criando Variaveis
    private int $idCloudCode;
    private int $name;
    private int $age;
    private int $biographyProfile;   
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

    public function setIdLocation(int $idLocation)
    {
        return $this->idLocation = $idLocation;
    }

    public function getIdLocation(int $idLocation)
    {
        return $this->idLocation;
    }

    public function setIdImage(int $idImage)
    {
        return $this->idLocation = $idImage;
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

    public function registerProfile()
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];

            $idUser = $this->idUser;

            $resArray["idUser"] =  $idUser;
            
        }

        echo json_encode($resArray);

        
    }

}