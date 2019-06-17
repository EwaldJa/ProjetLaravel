<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionEngagementRequest;
use App\Http\Requests\SuppressionImageEngagementRequest;
use App\Metier\Image;
use App\Metier\Engagement;

use App\Modeles\EngagementDAO;

class EngagementController extends Controller
{
    //Selection de tous les Engagements
    public function getEngagements(){
        $monEngagementDAO = new EngagementDAO();
        $lesEngagements = $monEngagementDAO->getLesEngagements();
        return view('listerEngagements',compact('lesEngagements'));
    }

    //Selection d'un Engagement par son id
    public function getEngagementById($id_Engagement)
    {
        $monEngagementDAO = new EngagementDAO();
        $leEngagement = $monEngagementDAO->getEngagementById($id_Engagement);
        $lesImages = $leEngagement->getLesImages();
        //pour simplifier l'accès aux données dans la vue "detailsEngagement', on passe deux objets
        //$leEngagement représente le Engagement qui a été sélectionné
        //$lesImages représente la liste des images associées à ce Engagement
        return view('detailsEngagement',compact('leEngagement','lesImages'));
    }

    public function modifEngagement(InsertionEngagementRequest $request) {
        if($request->input('Valider')) {
            return $this->updateEngagement($request);
        } elseif($request->input('Supprimer')) {
            return $this->supprEngagement($request);
        }
    }

    public function updateEngagement(InsertionEngagementRequest $request){
        $monEngagementDAO = new EngagementDAO();
        $monEngagement = new Engagement();
        $monEngagement->setIdEngagement($request->input('id_Engagement'));
        $monEngagement->setIntituleEngagement($request->input('intitule_Engagement'.$monEngagement->getIdEngagement()));
        $monEngagement->setDescriptionEngagement($request->input('description_Engagement'.$monEngagement->getIdEngagement()));
        $monEngagement->setLesImages($monEngagementDAO->getLesImages($monEngagement->getIdEngagement()));
        $monImage = new Image();
        $monImage->setLienImage($request->input('image_Engagement'.$monEngagement->getIdEngagement()));
        if ($monImage->getLienImage() == "") {
            $monImage = null;
        }
        $monEngagementDAO->updateEngagement($monEngagement, $monImage);
        $lesEngagements = $monEngagementDAO->getLesEngagements();
        return redirect('engagements');
    }

    public function creationEngagement(InsertionEngagementRequest $request){
        $monEngagement = new Engagement();
        $monEngagement->setIntituleEngagement($request->input('intitule_Engagement'));
        $monEngagement->setDescriptionEngagement($request->input('description_Engagement'));
        $monImage = new Image();
        $monImage->setLienImage($request->input('image_Engagement'));
        if ($monImage->getLienImage() == "") {
            $monImage = null;
        }
        $monEngagementDAO = new EngagementDAO();
        $monEngagementDAO->creationEngagement($monEngagement, $monImage);
        return redirect('engagements');
    }

    public function supprEngagement(InsertionEngagementRequest $request) {
        $monEngagementDAO = new EngagementDAO();
        $monEngagement = new Engagement();
        $monEngagement->setIdEngagement($request->input('id_Engagement'));
        $monEngagement->setIntituleEngagement($request->input('intitule_Engagement'.$monEngagement->getIdEngagement()));
        $monEngagement->setDescriptionEngagement($request->input('description_Engagement'.$monEngagement->getIdEngagement()));
        $monEngagement->setLesImages($monEngagementDAO->getLesImages($monEngagement->getIdEngagement()));
        $monEngagementDAO->supprEngagement($monEngagement);
        return redirect('engagements');
    }

    public function supprImage(SuppressionImageEngagementRequest $request) {
        $monImage = new Image();
        $monImage -> setIdImage($request->input('id_Image'));
        $monEngagementDAO = new EngagementDAO();
        $monEngagementDAO -> supprImage($monImage);
        return redirect('engagements');
    }

}
