<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Image;
use App\Metier\Service;

use App\Modeles\ServiceDAO;
//use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //Selection de tous les services
    public function getServices(){
        $serviceDAO = new ServiceDAO();
        $lesServices = $serviceDAO->getLesServices();
        return view('listerServices',compact('lesServices'));
    }

    //Selection d'un service par son id
    public function getServiceById($id_Service)
    {
        $serviceDAO = new ServiceDAO();
        $leService = $serviceDAO->getServiceById($id_Service);
        $lesImages = $leService->getLesImages();
        //pour simplifier l'accès aux données dans la vue "detailsService', on passe deux objets
        //$leService représente le service qui a été sélectionné
        //$lesImages représente la liste des images associées à ce service
        return view('detailsService',compact('leService','lesImages'));
    }
/*
    public function ajoutConference(){
        return view('formAjoutConference');
    }

    public function postAjoutConference(InsertionConfRequest $request){
        $maConference = new Service();
        $maConference->setIntituleConf($request->input('intituleConf'));
        $maConference->setDescriptionConf($request->input('descriptionConf'));
        $maConferenceDAO = new ServiceDAO();
        $maConferenceDAO->creationConference($maConference);
        return view('insertionOK');
    }
*/
}
