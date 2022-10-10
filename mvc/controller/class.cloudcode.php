<?php
 include_once("class.media.php");

class CloudCode extends Media
{
    private int $idCloudCode;
    private string $cloudCode;
    private string $idStatus;


    // Dados CodeCloud
    
    public function setIdCloudCode(int $idCloudCode)
    {
        return $this->idCloudCode = $idCloudCode;
    }
    public function getIdCloudCode()
    {
        return $this->idCloudCode;
    }

    public function setCloudCode(string $cloudCode)
    {
        return $this->cloudCode = strtolower(trim($cloudCode));
    }

    public function getCloudCode()
    {
        return $this->cloudCode;
    }

    public function registerCloudCode()
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $cloudCode = $this->cloudCode;
            $idStatus = 2;
            if (isset($cloudCode) && isset($idStatus)) {
                $insertCloudCode = $conn->prepare("INSERT INTO tb_cloud_code (cloud_code, id_status) VALUES(:cloudCode, :idStatus)");
                $insertCloudCode->bindParam(':cloudCode', $cloudCode, PDO::PARAM_STR);
                $insertCloudCode->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
                $insertCloudCode->execute();

                $resArray["redirect"] = TRUE;
            } else {
                $resArray["error"] =  "Don´t Work";
            }
        } else {
            exit("fora!");
        }
        echo json_encode($resArray);
    }
    public function reqIdCloudCode()
    {
        require '../db/connect.php';
        $resArray = [];
        $cloudCode = $this->cloudCode;
        $idStatus = 2;
        if (isset($cloudCode) && isset($idStatus)) {
            $consultCloudCode = $conn->prepare("SELECT * FROM tb_cloud_code WHERE cloud_code = :cloudCode AND id_status = :idStatus LIMIT 1");
            $consultCloudCode->bindParam(':cloudCode', $cloudCode, PDO::PARAM_STR);
            $consultCloudCode->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultCloudCode->execute();
            if ($consultCloudCode->rowCount() == 1) {
                $getCloudCode = $consultCloudCode->fetch(PDO::FETCH_OBJ);
                $resIdCloudCode = (int) $getCloudCode->id_cloud_code;
                return (int) $resIdCloudCode;
            }
        }
    }
}
