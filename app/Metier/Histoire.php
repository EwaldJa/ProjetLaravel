<?php


namespace App\Metier;


class Histoire
{
    private $id_Histoire;
    private $paragraphe_Histoire;

    /**
     * @return mixed
     */
    public function getIdHistoire()
    {
        return $this->id_Histoire;
    }

    /**
     * @param mixed $id_Histoire
     */
    public function setIdHistoire($id_Histoire): void
    {
        $this->id_Histoire = $id_Histoire;
    }

    /**
     * @return mixed
     */
    public function getParagrapheHistoire()
    {
        return $this->paragraphe_Histoire;
    }

    /**
     * @param mixed $paragraphe_Histoire
     */
    public function setParagrapheHistoire($paragraphe_Histoire): void
    {
        $this->paragraphe_Histoire = $paragraphe_Histoire;
    }

}