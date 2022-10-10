<?php
class Media
{
    private string $pathmMedia;
    private string $alternativeMedia;
    private int $idTypemMedia;
    private int $idStatus;

    // Dados Media
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
        if ($alternativeMedia == "profile/") {
            $alternativeMedia = 'Profile Photo';
            return $this->alternativeMedia = $alternativeMedia;
        } else if ($alternativeMedia == "posts/") {
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

    public function setIdStatus(int $idStatus)
    {
        return $this->idStatus = $idStatus;
    }

    public function getIdStatus()
    {
        return $this->idStatus;
    }

    public function addMedia()
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $pathMedia          = (string) $this->pathMedia;
            $alternativeMedia   = (string) $this->alternativeMedia;
            $idTypeMedia        = (int)    $this->idTypeMedia;
            $idStatus           = (int)    2;

            if (isset($pathMedia) && isset($alternativeMedia) && isset($idTypeMedia) && isset($idStatus)) {

                $insertMedia = $conn->prepare("INSERT INTO tb_media (path_media, alternative_media, id_type_media, id_status) 
                VALUES(
                    :pathMedia,
                    :alternativeMedia,
                    :idTypeMedia,
                    :idStatus
                    )");
                $insertMedia->bindParam(':pathMedia', $pathMedia, PDO::PARAM_STR);
                $insertMedia->bindParam(':alternativeMedia', $alternativeMedia, PDO::PARAM_STR);
                $insertMedia->bindParam(':idTypeMedia', $idTypeMedia, PDO::PARAM_INT);
                $insertMedia->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
                $insertMedia->execute();

            }
        } else {
            exit("fora!");
        }
        echo json_encode($resArray);
    }
    public function reqIdMedia(string $pathMedia, string $alternativeMedia, int $idTypeMedia)
    {
        require '../db/connect.php';
        $resArray = [];
        $idStatus           = (int)    2;
        if ( isset($pathMedia) && isset($alternativeMedia) && isset($idTypeMedia) ) {
            $consultMedia = $conn->prepare("SELECT * FROM tb_media WHERE path_media = :pathMedia AND
            alternative_media = :alternativeMedia AND id_type_media  = :idTypeMedia AND id_status = :idStatus LIMIT 1");
            $consultMedia->bindParam(':pathMedia', $pathMedia, PDO::PARAM_STR);
            $consultMedia->bindParam(':alternativeMedia', $alternativeMedia, PDO::PARAM_STR);
            $consultMedia->bindParam(':idTypeMedia', $idTypeMedia, PDO::PARAM_INT);
            $consultMedia->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultMedia->execute();
            if ($consultMedia->rowCount() === 1) {
                $getMedia = $consultMedia->fetch(PDO::FETCH_OBJ);
                $resIdMedia = (int) $getMedia->id_media;
                return (int) $resIdMedia;
            }
        }
    }
}
