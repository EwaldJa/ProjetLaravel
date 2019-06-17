<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionServiceRequest;
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

    public function updateService(){
        return view('listerServices');
    }

    public function creationService(InsertionServiceRequest $request){
        $monService = new Service();
        $monService->setIdService(Crypt::decrypt($request->input('intitule_Service')));
        $monService->setIntituleService($request->input('intitule_Service'));
        $monService->setDescriptionService($request->input('description_Service'));
        $monImage = ($request->input('image_Service'));
        if ($monImage == "") {
            $monImage = null;
        }
        $monServiceDAO = new ServiceDAO();
        $monServiceDAO->creationService($monService);
        return view('listerServices');
    }

}
