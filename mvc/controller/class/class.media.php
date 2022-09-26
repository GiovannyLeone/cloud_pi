<?php
class Media
{
    private string $pathImage;
    private string $alternativeImage;
    private int $idTypeImage;
    private int $idStatus;

        // Dados Media
        public function setIdCloudCode(int $idCloudCode)
        {
            return $this->idCloudCode = $idCloudCode;
        }
    
        public function getIdCloudCode(int $idCloudCode)
        {
            return $this->idCloudCode;
        }

}