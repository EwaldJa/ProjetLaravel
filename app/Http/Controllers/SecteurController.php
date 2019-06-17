<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionSecteurActiviteRequest;
use App\Http\Requests\SuppressionImageSecteurActiviteRequest;
use App\Metier\Image;
use App\Metier\SecteurActivite;

use App\Modeles\SecteurActiviteDAO;

class SecteurController extends Controller
{
    //Selection de tous les SecteurActivites
    public function getSecteurActivites(){
        $monSecteurActiviteDAO = new SecteurActiviteDAO();
        $lesSecteurActivites = $monSecteurActiviteDAO->getLesSecteurActivites();
        return view('listerSecteursActivite',compact('lesSecteurActivites'));
    }

    //Selection d'un SecteurActivite par son id
    public function getSecteurActiviteById($id_SecteurActivite)
    {
        $monSecteurActiviteDAO = new SecteurActiviteDAO();
        $leSecteurActivite = $monSecteurActiviteDAO->getSecteurActiviteById($id_SecteurActivite);
        $lesImages = $leSecteurActivite->getLesImages();
        //pour simplifier l'accès aux données dans la vue "detailsSecteurActivite', on passe deux objets
        //$leSecteurActivite représente le SecteurActivite qui a été sélectionné
        //$lesImages représente la liste des images associées à ce SecteurActivite
        return view('detailsSecteurActivite',compact('leSecteurActivite','lesImages'));
    }

    public function modifSecteurActivite(InsertionSecteurActiviteRequest $request) {
        if($request->input('Valider')) {
            return $this->updateSecteurActivite($request);
        } elseif($request->input('Supprimer')) {
            return $this->supprSecteurActivite($request);
        }
    }

    public function updateSecteurActivite(InsertionSecteurActiviteRequest $request){
        $monSecteurActiviteDAO = new SecteurActiviteDAO();
        $monSecteurActivite = new SecteurActivite();
        $monSecteurActivite->setIdSecteurActivite($request->input('id_SecteurActivite'));
        $monSecteurActivite->setIntituleSecteurActivite($request->input('intitule_SecteurActivite'.$monSecteurActivite->getIdSecteurActivite()));
        $monSecteurActivite->setDescriptionSecteurActivite($request->input('description_SecteurActivite'.$monSecteurActivite->getIdSecteurActivite()));
        $monSecteurActivite->setLesImages($monSecteurActiviteDAO->getLesImages($monSecteurActivite->getIdSecteurActivite()));
        $monImage = new Image();
        $monImage->setLienImage($request->input('image_SecteurActivite'.$monSecteurActivite->getIdSecteurActivite()));
        if ($monImage->getLienImage() == "") {
            $monImage = null;
        }
        $monSecteurActiviteDAO->updateSecteurActivite($monSecteurActivite, $monImage);
        $lesSecteurActivites = $monSecteurActiviteDAO->getLesSecteurActivites();
        return redirect('secteurs');
    }

    public function creationSecteurActivite(InsertionSecteurActiviteRequest $request){
        $monSecteurActivite = new SecteurActivite();
        $monSecteurActivite->setIntituleSecteurActivite($request->input('intitule_SecteurActivite'));
        $monSecteurActivite->setDescriptionSecteurActivite($request->input('description_SecteurActivite'));
        $monImage = new Image();
        $monImage->setLienImage($request->input('image_SecteurActivite'));
        if ($monImage->getLienImage() == "") {
            $monImage = null;
        }
        $monSecteurActiviteDAO = new SecteurActiviteDAO();
        $monSecteurActiviteDAO->creationSecteurActivite($monSecteurActivite, $monImage);
        return redirect('secteurs');
    }

    public function supprSecteurActivite(InsertionSecteurActiviteRequest $request) {
        $monSecteurActiviteDAO = new SecteurActiviteDAO();
        $monSecteurActivite = new SecteurActivite();
        $monSecteurActivite->setIdSecteurActivite($request->input('id_SecteurActivite'));
        $monSecteurActivite->setIntituleSecteurActivite($request->input('intitule_SecteurActivite'.$monSecteurActivite->getIdSecteurActivite()));
        $monSecteurActivite->setDescriptionSecteurActivite($request->input('description_SecteurActivite'.$monSecteurActivite->getIdSecteurActivite()));
        $monSecteurActivite->setLesImages($monSecteurActiviteDAO->getLesImages($monSecteurActivite->getIdSecteurActivite()));
        $monSecteurActiviteDAO->supprSecteurActivite($monSecteurActivite);
        return redirect('secteurs');
    }

    public function supprImage(SuppressionImageSecteurActiviteRequest $request) {
        $monImage = new Image();
        $monImage -> setIdImage($request->input('id_Image'));
        $monSecteurActiviteDAO = new SecteurActiviteDAO();
        $monSecteurActiviteDAO -> supprImage($monImage);
        return redirect('secteurs');
    }

}
