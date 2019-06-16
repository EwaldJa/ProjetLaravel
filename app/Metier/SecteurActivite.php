<?php


namespace App\Metier;


class SecteurActivite
{
    private $id_Secteur;
    private $intitule_Secteur;
    private $description_Secteur;
    private $images_Secteur = array();

    /**
     * @return mixed
     */
    public function getIdSecteur()
    {
        return $this->id_Secteur;
    }

    /**
     * @param mixed $id_Secteur
     */
    public function setIdSecteur($id_Secteur): void
    {
        $this->id_Secteur = $id_Secteur;
    }

    /**
     * @return mixed
     */
    public function getIntituleSecteur()
    {
        return $this->intitule_Secteur;
    }

    /**
     * @param mixed $intitule_Secteur
     */
    public function setIntituleSecteur($intitule_Secteur): void
    {
        $this->intitule_Secteur = $intitule_Secteur;
    }

    /**
     * @return mixed
     */
    public function getDescriptionSecteur()
    {
        return $this->description_Secteur;
    }

    /**
     * @param mixed $description_Secteur
     */
    public function setDescriptionSecteur($description_Secteur): void
    {
        $this->description_Secteur = $description_Secteur;
    }

    /**
     * @return array
     */
    public function getImagesSecteur(): array
    {
        return $this->images_Secteur;
    }

    /**
     * @param array $images_Secteur
     */
    public function setImagesSecteur(array $images_Secteur): void
    {
        $this->images_Secteur = $images_Secteur;
    }

}
