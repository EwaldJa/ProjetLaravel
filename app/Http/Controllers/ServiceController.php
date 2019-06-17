<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionServiceRequest;
use App\Http\Requests\SuppressionImageServiceRequest;
use App\Metier\Image;
use App\Metier\Service;

use App\Modeles\ServiceDAO;

class ServiceController extends Controller
{
    //Selection de tous les services
    public function getServices(){
        $monServiceDAO = new ServiceDAO();
        $lesServices = $monServiceDAO->getLesServices();
        return view('listerServices',compact('lesServices'));
    }

    //Selection d'un service par son id
    public function getServiceById($id_Service)
    {
        $monServiceDAO = new ServiceDAO();
        $leService = $monServiceDAO->getServiceById($id_Service);
        $lesImages = $leService->getLesImages();
        //pour simplifier l'accès aux données dans la vue "detailsService', on passe deux objets
        //$leService représente le service qui a été sélectionné
        //$lesImages représente la liste des images associées à ce service
        return view('detailsService',compact('leService','lesImages'));
    }

    public function modifService(InsertionServiceRequest $request) {
        if($request->input('Valider')) {
            return $this->updateService($request);
        } elseif($request->input('Supprimer')) {
            return $this->supprService($request);
        }
    }

    public function updateService(InsertionServiceRequest $request){
        $monServiceDAO = new ServiceDAO();
        $monService = new Service();
        $monService->setIdService($request->input('id_Service'));
        $monService->setIntituleService($request->input('intitule_Service'.$monService->getIdService()));
        $monService->setDescriptionService($request->input('description_Service'.$monService->getIdService()));
        $monService->setLesImages($monServiceDAO->getLesImages($monService->getIdService()));
        $monImage = new Image();
        $monImage->setLienImage($request->input('image_Service'.$monService->getIdService()));
        if ($monImage->getLienImage() == "") {
            $monImage = null;
        }
        $monServiceDAO->updateService($monService, $monImage);
        $lesServices = $monServiceDAO->getLesServices();
        return redirect('prestations');
    }

    public function creationService(InsertionServiceRequest $request){
        $monService = new Service();
        $monService->setIntituleService($request->input('intitule_Service'));
        $monService->setDescriptionService($request->input('description_Service'));
        $monImage = new Image();
        $monImage->setLienImage($request->input('image_Service'));
        if ($monImage->getLienImage() == "") {
            $monImage = null;
        }
        $monServiceDAO = new ServiceDAO();
        $monServiceDAO->creationService($monService, $monImage);
        return redirect('prestations');
    }

    public function supprService(InsertionServiceRequest $request) {
        $monServiceDAO = new ServiceDAO();
        $monService = new Service();
        $monService->setIdService($request->input('id_Service'));
        $monService->setIntituleService($request->input('intitule_Service'.$monService->getIdService()));
        $monService->setDescriptionService($request->input('description_Service'.$monService->getIdService()));
        $monService->setLesImages($monServiceDAO->getLesImages($monService->getIdService()));
        $monServiceDAO->supprService($monService);
        return redirect('prestations');
    }

    public function supprImage(SuppressionImageServiceRequest $request) {
        $monImage = new Image();
        $monImage -> setIdImage($request->input('id_Image'));
        $monServiceDAO = new ServiceDAO();
        $monServiceDAO -> supprImage($monImage);
        return redirect('prestations');
    }

}
