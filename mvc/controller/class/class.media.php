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
            $pathImage = (string) $this->pathImage;
            $alternativeImage = (string) $this->alternativeImage;
            $idTypeImage = (int) $this->idTypeImage;
            $idStatus = (int) 2;
            if (isset($pathImage) && isset($alternativeImage) && isset($idTypeImage) && isset($idStatus)) {
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
}
