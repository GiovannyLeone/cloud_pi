<?php
class Media
{
    private string $pathImage;
    private string $alternativeImage;
    private int $idTypeImage;
    private int $idStatus;

    // Dados Media
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
        return $this->alternativeImage = $alternativeImage;
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

    public function setIdStatus(int $idStatus)
    {
        return $this->idStatus = $idStatus;
    }

    public function getIdStatus(int $idStatus)
    {
        return $this->idStatus;
    }

    public function addMedia()
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $pathImage          = (string) $this->pathImage;
            $alternativeImage   = (string) $this->alternativeImage;
            $idTypeImage        = (int)    $this->idTypeImage;
            $idStatus           = (int) 2;

            if (isset($pathImage) && isset($alternativeImage) && isset($idTypeImage) && isset($idStatus)) {

                if ($alternativeImage === 'profile/') {
                    $alternativeImage = 'Profile Photo';
                } else if ($alternativeImage === 'posts/') {
                    $alternativeImage = 'Publication';
                } else{
                    $alternativeImage = '';
                }


                $insertMedia = $conn->prepare("INSERT INTO tb_image (path_image, alternative_image, id_type_image, id_status) 
                VALUES(
                    :pathImage,
                    :alternativeImage,
                    :idTypeImage,
                    :idStatus,
                    )");
                $insertMedia->bindParam(':pathImage', $pathImage, PDO::PARAM_STR);
                $insertMedia->bindParam(':alternativeImage', $alternativeImage, PDO::PARAM_STR);
                $insertMedia->bindParam(':idTypeImage', $idTypeImage, PDO::PARAM_INT);
                $insertMedia->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
                $insertMedia->execute();

            }
        } else {
            exit("fora!");
        }
        echo json_encode($resArray);
    }
    public function reqIdMedia()
    {
        require '../db/connect.php';
        $resArray = [];
        $pathImage          = (string) $this->pathImage;
        $alternativeImage   = (string) $this->alternativeImage;
        $idTypeImage        = (int) $this->idTypeImage;
        $idStatus           = (int) 2;
        if ( isset($pathImage) && isset($alternativeImage) && isset($idTypeImage) ) {
            $consultMedia = $conn->prepare("SELECT * FROM tb_image WHERE path_image = :pathImage AND
            alternative_image = :alternativeImage AND id_type_image  = :idTypeImage AND id_status = idStatus LIMIT 1");
            $consultMedia->bindParam(':pathImage', $pathImage, PDO::PARAM_STR);
            $consultMedia->bindParam(':alternativeImage', $alternativeImage, PDO::PARAM_STR);
            $consultMedia->bindParam(':idTypeImage', $idTypeImage, PDO::PARAM_INT);
            $consultMedia->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultMedia->execute();
            if ($consultMedia->rowCount() === 1) {
                $getMedia = $consultMedia->fetch(PDO::FETCH_ASSOC);
                $resIdMedia = (int) $getMedia['id_image'];
                $resArray['resIdMedia'] = $resIdMedia;
                return (int) $resArray['resIdMedia'];
            }
        }
    }
}
