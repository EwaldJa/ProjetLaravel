<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\SecteurActivite;

class SecteurActiviteDAO extends DAO
{

    public function getLesSecteurActivites()
    {
        $SecteurActivites = DB::table('enregistrement')->where('categorie', '=', 'secteurs')->get();
        $lesSecteurActivites = array();
        foreach ($SecteurActivites as $leSecteurActivite) {
            $id_enregistrement = $leSecteurActivite->id_enregistrement;
            $lesSecteurActivites[$id_enregistrement] = $this->creerObjetMetier($leSecteurActivite);
        }
        return $lesSecteurActivites;
    }

    public function getSecteurActiviteById($id_enregistrement)
    {
        //On sélectionne un SecteurActivite par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monSecteurActivite = DB::table('enregistrement')->where('id_enregistrement', '=', $id_enregistrement)->first();
        $SecteurActivite = $this->creerObjetMetier($monSecteurActivite);
        return $SecteurActivite;
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
        $leSecteurActivite = new SecteurActivite();
        $leSecteurActivite->setIdSecteurActivite($objet->id_enregistrement);
        $leSecteurActivite->setIntituleSecteurActivite($objet->intitule);
        $leSecteurActivite->setDescriptionSecteurActivite($objet->description);
        //Il faut maintenant sélectionner les images associées au SecteurActivite
        $lesImages = $this->getLesImages($objet->id_enregistrement);
        //Si le SecteurActivite possède des images
        if($lesImages){
            //On modifie l'attribut images_SecteurActivite de la classe iSecteurActivite
            $leSecteurActivite->setLesImages($lesImages);
        }
        else
            $leSecteurActivite->setLesImages(null);
        return $leSecteurActivite;
    }

    protected function creerImageMetier(\stdClass $objet) {
        $limage = new Image();
        $limage -> setIdImage($objet -> id_image);
        $limage -> setFKImage($objet -> fk_enregistrement);
        $limage -> setLienImage($objet -> lien_image);
        return $limage;
    }

    public function creationSecteurActivite(SecteurActivite $unSecteurActivite, $monImage){
        DB::table('enregistrement')->insert(['intitule'=>$unSecteurActivite->getIntituleSecteurActivite(),'description'=>$unSecteurActivite->getDescriptionSecteurActivite(),'categorie'=>'secteurs']);
        $id = DB::getPDO()->lastInsertId();
        if($monImage != null){
            $monImage->setFKImage($id);
            DB::table('images')->insert(['fk_enregistrement'=>$monImage->getFKImage(),'lien_image'=>$monImage->getLienImage()]);
        }
    }

    public function updateSecteurActivite(SecteurActivite $unSecteurActivite, $monImage){
        DB::table('enregistrement')->where('id_enregistrement',$unSecteurActivite->getIdSecteurActivite())->update(['intitule'=>$unSecteurActivite->getIntituleSecteurActivite(),'description'=>$unSecteurActivite->getDescriptionSecteurActivite()]);
        if($monImage != null){
            if($unSecteurActivite->getLesImages()!=null) {
                DB::table('image')->where('id_image', '=', $unSecteurActivite->getLesImages()[0]->getIdImage())->update(['lien_image' => $monImage->getLienImage()]);
            }else {
                DB::table('image')->insert(['fk_enregistrement' => $unSecteurActivite->getIdSecteurActivite(), 'lien_image' => $monImage->getLienImage()]);
            }
        }else{
            if($unSecteurActivite->getLesImages()!=null) {
                DB::table('image')->where('fk_enregistrement', '=', $unSecteurActivite->getLesImages()[0])->delete();
            }
        }
    }

    public function supprImage(Image $monImage) {
        DB::table('image')->where('id_image','=', $monImage->getIdImage())->delete();
    }

    public function supprSecteurActivite(SecteurActivite $monSecteurActivite) {
        $lesImages = $monSecteurActivite->getLesImages();
        if ($lesImages != null) {
            foreach ($lesImages as $uneImage) {
                $this->supprImage($uneImage);
            }
        }
        DB::table('enregistrement')->where('id_enregistrement', '=', $monSecteurActivite->getIdSecteurActivite())->andWhere('categorie', '=', 'secteurs')->delete();
    }


}