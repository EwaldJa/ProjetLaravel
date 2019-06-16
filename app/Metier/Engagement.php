<?php


namespace App\Metier;


class Engagement
{
    private $id_Engagement;
    private $intitule_Engagement;
    private $description_Engagement;
    private $images_Engagement = array();

    /**
     * @return array
     */
    public function getLesImages()
    {
        return $this->images_Engagement;
    }

    /**
     * @param array $images_Engagement
     */
    public function setLesImages($images_Engagement): void
    {
        $this->images_Engagement = $images_Engagement;
    }

    /**
     * @return mixed
     */
    public function getIdEngagement()
    {
        return $this->id_Engagement;
    }

    /**
     * @param mixed $id_Engagement
     */
    public function setIdEngagement($id_Engagement): void
    {
        $this->id_Engagement = $id_Engagement;
    }

    /**
     * @return mixed
     */
    public function getIntituleEngagement()
    {
        return $this->intitule_Engagement;
    }

    /**
     * @param mixed $intitule_Engagement
     */
    public function setIntituleEngagement($intitule_Engagement): void
    {
        $this->intitule_Engagement = $intitule_Engagement;
    }

    /**
     * @return mixed
     */
    public function getDescriptionEngagement()
    {
        return $this->description_Engagement;
    }

    /**
     * @param mixed $description_Engagement
     */
    public function setDescriptionEngagement($description_Engagement): void
    {
        $this->description_Engagement = $description_Engagement;
    }

}