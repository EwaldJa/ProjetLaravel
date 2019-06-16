<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\Engagement;

class EngagementDAO extends DAO
{

    public function getLesEngagements()
    {
        $engagements = DB::table('engagements')->get();
        $lesEngagements = array();
        foreach ($engagements as $leEngagement) {
            $id_Engagement = $leEngagement->id_Engagement;
            $lesEngagements[$id_Engagement] = $this->creerObjetMetier($leEngagement);
        }
        return $lesEngagements;
    }

    public function getEngagementById($id_Engagement)
    {
        //On sélectionne un engagement par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monEngagement = DB::table('engagements')->where('id_Engagement', '=', $id_Engagement)->first();
        $engagement = $this->creerObjetMetier($monEngagement);
        return $engagement;
    }

    public function getLesImages($id_Engagement) {
        $images = DB::table('images_engagements')->where('fk_Image', '=', $id_Engagement)->get();
        $lesImages = array();
        $i = 0;
        foreach ($images as $limage) {
            $lesImages[$i] = $this->creerImageMetier($limage);
            $i = $i + 1;
        }
        return $lesImages;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $leEngagement = new Engagement();
        $leEngagement->setIdEngagement($objet->id_Engagement);
        $leEngagement->setIntituleEngagement($objet->intitule_Engagement);
        $leEngagement->setDescriptionEngagement($objet->description_Engagement);
        //Il faut maintenant sélectionner les images associées au engagement
        $lesImages = $this->getLesImages($objet->id_Engagement);
        //Si le engagement possède des images
        if($lesImages){
            //On modifie l'attribut images_Engagement de la classe iEngagement
            $leEngagement->setLesImages($lesImages);
        }
        else
            $leEngagement->setLesImages(null);
        return $leEngagement;
    }

    protected function creerImageMetier(\stdClass $objet) {
        $limage = new Image();
        $limage -> setIdImage($objet -> id_Image);
        $limage -> setFKImage($objet -> fk_Image);
        $limage -> setLienEngagement($objet -> lien_Image);
        return $limage;
    }

    public function creationConference(Engagement $unEngagement){
        DB::table('engagements')->insert(['id_Engagement'=>$unEngagement->getIdEngagement(),'intitule_Engagement'=>$unEngagement->getIntituleEngagement(),'description_Engagement'=>$unEngagement->getDescriptionEngagement()]);
    }




}