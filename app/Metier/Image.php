<?php


namespace App\Metier;


class Image
{
    private $id_Image;
    private $fk_Image;
    private $lien_Image;

    public function getIdImage()
    {
        return $this->id_Image;
    }

    public function setIdImage($id_Image)
    {
        $this->$id_Image = $id_Image;
    }

    public function getFKImage()
    {
        return $this->intitule_Image;
    }

    public function setFKImage($fk_Image)
    {
        $this->fk_Image = $fk_Image;
    }

    public function getLienImage()
    {
        return $this->lien_Image;
    }

    public function setLienImage($lien_Image)
    {
        $this->lien_Image = $lien_Image;
    }
}