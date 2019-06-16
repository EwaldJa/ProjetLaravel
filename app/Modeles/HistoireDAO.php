<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\Histoire;

class HistoireDAO extends DAO
{

    public function getLesHistoires()
    {
        $histoires = DB::table('histoires')->get();
        $lesHistoires = array();
        foreach ($histoires as $uneHistoire) {
            $id_Histoire = $uneHistoire->id_Histoire;
            $lesHistoires[$id_Histoire] = $this->creerObjetMetier($uneHistoire);
        }
        return $lesHistoires;
    }

    public function getHistoireById($id_Histoire)
    {
        //On sélectionne un histoire par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monHistoire = DB::table('histoires')->where('id_Histoire', '=', $id_Histoire)->first();
        $histoire = $this->creerObjetMetier($monHistoire);
        return $histoire;
    }

    public function getLesImages($id_Histoire) {
        $images = DB::table('images_histoires')->where('fk_Image', '=', $id_Histoire)->get();
        $lesImages = array();
        foreach ($images as $limage) {
            $id_Image = $limage->id_Image;
            $lesImages[$id_Image] = $this->creerImageMetier($limage);
        }
        return $lesImages;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $uneHistoire = new Histoire();
        $uneHistoire->setIdHistoire($objet->id_Histoire);
        $uneHistoire->setIntituuneHistoire($objet->intitule_Histoire);
        $uneHistoire->setDescriptionHistoire($objet->description_Histoire);
        //Il faut maintenant sélectionner les images associées au histoire
        $lesImages = $this->getLesImages($objet->id_Histoire);
        //Si le histoire possède des images
        if($lesImages){
            //On modifie l'attribut images_Histoire de la classe iHistoire
            $uneHistoire->setLesImages($lesImages);
        }
        else
            $uneHistoire->setLesImages(null);
        return $uneHistoire;
    }

    protected function creerImageMetier(\stdClass $objet) {
        $limage = new Image();
        $limage -> setIdImage($objet -> id_Image);
        $limage -> setFKImage($objet -> fk_Image);
        $limage -> setLienHistoire($objet -> lien_Image);
        return $limage;
    }

    public function creationConference(Histoire $unHistoire){
        DB::table('histoires')->insert(['id_Histoire'=>$unHistoire->getIdHistoire(),'intitule_Histoire'=>$unHistoire->getIntituuneHistoire(),'description_Histoire'=>$unHistoire->getDescriptionHistoire()]);
    }




}