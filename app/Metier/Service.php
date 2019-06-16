<?php


namespace App\Metier;


class Service
{
    private $id_Service;
    private $intitule_Service;
    private $description_Service;
    private $images_Service=array();

    public function getIdService()
    {
        return $this->idConf;
    }

    public function setIdService($idConf)
    {
        $this->idConf = $idConf;
    }

    public function getIntituleService()
    {
        return $this->intituleConf;
    }

    public function setIntituleService($intituleConf)
    {
        $this->intituleConf = $intituleConf;
    }

    public function getDescriptionService()
    {
        return $this->descriptionConf;
    }

    public function setDescriptionService($descriptionConf)
    {
        $this->descriptionConf = $descriptionConf;
    }

    public function getLesCommentaires()
    {
        return $this->lesCommentaires;
    }

    public function setLesCommentaires($commentaires)
    {
        $this->lesCommentaires=$commentaires;
    }
}