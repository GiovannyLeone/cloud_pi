<?php
class Media
{
    private string $typeMedia;
    private int $idStatus;

    // Dados Media
    public function setTypeMedia(string $typeMedia)
    {
        return $this->typeMedia = $typeMedia;
    }

    public function getTypeMedia()
    {
        return $this->typeMedia;
    }

    public function setIdStatus(int $idStatus)
    {
        return $this->idStatus = $idStatus;
    }

    public function getIdStatus()
    {
        return $this->idStatus;
    }

}
