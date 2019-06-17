<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\Engagement;

class EngagementDAO extends DAO
{

    public function getLesEngagements()
    {
        $Engagements = DB::table('enregistrement')->where('categorie', '=', 'engagements')->get();
        $lesEngagements = array();
        foreach ($Engagements as $leEngagement) {
            $id_enregistrement = $leEngagement->id_enregistrement;
            $lesEngagements[$id_enregistrement] = $this->creerObjetMetier($leEngagement);
        }
        return $lesEngagements;
    }

    public function getEngagementById($id_enregistrement)
    {
        //On sélectionne un Engagement par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monEngagement = DB::table('enregistrement')->where('id_enregistrement', '=', $id_enregistrement)->first();
        $Engagement = $this->creerObjetMetier($monEngagement);
        return $Engagement;
    }

    public function getLesImages($id_enregistrement) {
        $images = DB::table('image')->where('fk_enregistrement', '=', $id_enregistrement)->get();
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
        $leEngagement->setIdEngagement($objet->id_enregistrement);
        $leEngagement->setIntituleEngagement($objet->intitule);
        $leEngagement->setDescriptionEngagement($objet->description);
        //Il faut maintenant sélectionner les images associées au Engagement
        $lesImages = $this->getLesImages($objet->id_enregistrement);
        //Si le Engagement possède des images
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
        $limage -> setIdImage($objet -> id_image);
        $limage -> setFKImage($objet -> fk_enregistrement);
        $limage -> setLienImage($objet -> lien_image);
        return $limage;
    }

    public function creationEngagement(Engagement $unEngagement, $monImage){
        DB::table('enregistrement')->insert(['intitule'=>$unEngagement->getIntituleEngagement(),'description'=>$unEngagement->getDescriptionEngagement(),'categorie'=>'engagements']);
        $id = DB::getPDO()->lastInsertId();
        if($monImage != null){
            $monImage->setFKImage($id);
            DB::table('image')->insert(['fk_enregistrement'=>$monImage->getFKImage(),'lien_image'=>$monImage->getLienImage()]);
        }
    }

    public function updateEngagement(Engagement $unEngagement, $monImage){
        DB::table('enregistrement')->where('id_enregistrement',$unEngagement->getIdEngagement())->update(['intitule'=>$unEngagement->getIntituleEngagement(),'description'=>$unEngagement->getDescriptionEngagement()]);
        if($monImage != null){
            if($unEngagement->getLesImages()!=null) {
                DB::table('image')->where('id_image', '=', $unEngagement->getLesImages()[0]->getIdImage())->update(['lien_image' => $monImage->getLienImage()]);
            }else {
                DB::table('image')->insert(['fk_enregistrement' => $unEngagement->getIdEngagement(), 'lien_image' => $monImage->getLienImage()]);
            }
        }else{
            if($unEngagement->getLesImages()!=null) {
                DB::table('image')->where('fk_enregistrement', '=', $unEngagement->getLesImages()[0])->delete();
            }
        }
    }

    public function supprImage(Image $monImage) {
        DB::table('image')->where('id_image','=', $monImage->getIdImage())->delete();
    }

    public function supprEngagement(Engagement $monEngagement) {
        $lesImages = $monEngagement->getLesImages();
        if ($lesImages != null) {
            foreach ($lesImages as $uneImage) {
                $this->supprImage($uneImage);
            }
        }
        DB::table('enregistrement')->where('id_enregistrement', '=', $monEngagement->getIdEngagement())->andWhere('categorie', '=', 'engagements')->delete();
    }


}