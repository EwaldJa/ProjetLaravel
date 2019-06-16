<?php


namespace App\Metier;


class Formation
{
    private $idForm;
    private $intituleForm;
    private $descriptionForm;

    public function getIdForm()
    {
        return $this->idForm;
    }

    public function setIdForm($idForm)
    {
        $this->idForm = $idForm;
    }

    public function getIntituleForm()
    {
        return $this->intituleForm;
    }

    public function setIntituleForm($intituleForm)
    {
        $this->intituleForm = $intituleForm;
    }

    public function getDescriptionForm()
    {
        return $this->descriptionForm;
    }

    public function setDescriptionForm($descriptionForm)
    {
        $this->descriptionForm = $descriptionForm;
    }


}