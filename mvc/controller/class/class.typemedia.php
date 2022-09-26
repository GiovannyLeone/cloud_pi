<?php
class Media
{
    private string $typeImage;
    private int $idStatus;

    // Dados Media
    public function setTypeImage(string $typeImage)
    {
        return $this->typeImage = $typeImage;
    }

    public function getTypeImage(string $typeImage)
    {
        return $this->typeImage;
    }

    public function setIdStatus(int $idStatus)
    {
        return $this->idStatus = $idStatus;
    }

    public function getIdStatus(int $idStatus)
    {
        return $this->idStatus;
    }

}
