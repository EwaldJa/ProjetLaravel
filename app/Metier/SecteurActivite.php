<?php


namespace App\Metier;


class SecteurActivite
{
    private $id_SecteurActivite;
    private $intitule_SecteurActivite;
    private $description_SecteurActivite;
    private $images_SecteurActivite = array();

    /**
     * @return mixed
     */
    public function getIdSecteurActivite()
    {
        return $this->id_SecteurActivite;
    }

    /**
     * @param mixed $id_SecteurActivite
     */
    public function setIdSecteurActivite($id_SecteurActivite): void
    {
        $this->id_SecteurActivite = $id_SecteurActivite;
    }

    /**
     * @return mixed
     */
    public function getIntituleSecteurActivite()
    {
        return $this->intitule_SecteurActivite;
    }

    /**
     * @param mixed $intitule_SecteurActivite
     */
    public function setIntituleSecteurActivite($intitule_SecteurActivite): void
    {
        $this->intitule_SecteurActivite = $intitule_SecteurActivite;
    }

    /**
     * @return mixed
     */
    public function getDescriptionSecteurActivite()
    {
        return $this->description_SecteurActivite;
    }

    /**
     * @param mixed $description_SecteurActivite
     */
    public function setDescriptionSecteurActivite($description_SecteurActivite): void
    {
        $this->description_SecteurActivite = $description_SecteurActivite;
    }

    /**
     * @return array
     */
    public function getlesImages()
    {
        return $this->images_SecteurActivite;
    }

    /**
     * @param array $images_SecteurActivite
     */
    public function setlesImages( $images_SecteurActivite): void
    {
        $this->images_SecteurActivite = $images_SecteurActivite;
    }

}
