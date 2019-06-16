<?php


namespace App\Metier;


class Conference
{
    private $idConf;
    private $intituleConf;
    private $lesCommentaires=array();

    public function getIdConf()
    {
        return $this->idConf;
    }

    public function setIdConf($idConf)
    {
        $this->idConf = $idConf;
    }

    public function getIntituleConf()
    {
        return $this->intituleConf;
    }

    public function setIntituleConf($intituleConf)
    {
        $this->intituleConf = $intituleConf;
    }

    public function getDescriptionConf()
    {
        return $this->descriptionConf;
    }

    public function setDescriptionConf($descriptionConf)
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