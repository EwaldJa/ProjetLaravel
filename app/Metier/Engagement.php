<?php


namespace App\Metier;


class Engagement
{
    private $id_Service;
    private $intitule_Service;
    private $description_Service;
    private $images_Service=array();

    public function getIdService()
    {
        return $this->id_Service;
    }

    public function setIdService($id_Service)
    {
        $this->$id_Service = $id_Service;
    }

    public function getIntituleService()
    {
        return $this->intitule_Service;
    }

    public function setIntituleService($intitule_Service)
    {
        $this->intitule_Service = $intitule_Service;
    }

    public function getDescriptionService()
    {
        return $this->description_Service;
    }

    public function setDescriptionService($description_Service)
    {
        $this->description_Service = $description_Service;
    }

    public function getLesImages()
    {
        return $this->images_Service;
    }

    public function setLesImages($images_Service)
    {
        $this->images_Service=$images_Service;
    }
}