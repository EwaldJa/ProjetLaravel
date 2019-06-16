<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\SecteurActivite;

class SecteurActiviteDAO extends DAO
{

    public function getLesSecteurActivites()
    {
        $secteurActivites = DB::table('secteurActivites')->get();
        $lesSecteurActivites = array();
        foreach ($secteurActivites as $leSecteurActivite) {
            $id_SecteurActivite = $leSecteurActivite->id_SecteurActivite;
            $lesSecteurActivites[$id_SecteurActivite] = $this->creerObjetMetier($leSecteurActivite);
        }
        return $lesSecteurActivites;
    }

    public function getSecteurActiviteById($id_SecteurActivite)
    {
        //On sélectionne un secteurActivite par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monSecteurActivite = DB::table('secteurActivites')->where('id_SecteurActivite', '=', $id_SecteurActivite)->first();
        $secteurActivite = $this->creerObjetMetier($monSecteurActivite);
        return $secteurActivite;
    }

    public function getLesImages($id_SecteurActivite) {
        $images = DB::table('images_secteurActivites')->where('fk_Image', '=', $id_SecteurActivite)->get();
        $lesImages = array();
        foreach ($images as $limage) {
            $id_Image = $limage->id_Image;
            $lesImages[$id_Image] = $this->creerImageMetier($limage);
        }
        return $lesImages;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $leSecteurActivite = new SecteurActivite();
        $leSecteurActivite->setIdSecteurActivite($objet->id_SecteurActivite);
        $leSecteurActivite->setIntituleSecteurActivite($objet->intitule_SecteurActivite);
        $leSecteurActivite->setDescriptionSecteurActivite($objet->description_SecteurActivite);
        //Il faut maintenant sélectionner les images associées au secteurActivite
        $lesImages = $this->getLesImages($objet->id_SecteurActivite);
        //Si le secteurActivite possède des images
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
        $limage -> setIdImage($objet -> id_Image);
        $limage -> setFKImage($objet -> fk_Image);
        $limage -> setLienSecteurActivite($objet -> lien_Image);
        return $limage;
    }

    public function creationConference(SecteurActivite $unSecteurActivite){
        DB::table('secteurActivites')->insert(['id_SecteurActivite'=>$unSecteurActivite->getIdSecteurActivite(),'intitule_SecteurActivite'=>$unSecteurActivite->getIntituleSecteurActivite(),'description_SecteurActivite'=>$unSecteurActivite->getDescriptionSecteurActivite()]);
    }




}