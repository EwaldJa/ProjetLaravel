<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Image;
use App\Metier\Service;

use App\Modeles\ServiceDAO;
//use Illuminate\Http\Request;

class EngagementController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getServices(){
        $conference = new ServiceDAO();
        $lesConferences = $conference->getLesServices();
        return view('listerConferences',compact('lesConferences'));
    }

    //Selection d'une conference par son id
    public function getServiceById($idConf)
    {
        $conference = new ServiceDAO();
        $laConference = $conference->getServiceById($idConf);
        $lesCommentaires = $laConference->getLesCommentaires();
        //pour simplifier l'accès aux données dans la vue "ListerCommentaire', on passe deux objets
        //laConference représente la conférence qui a été sélectionnée
        //lesCommentaires représente la liste des commentaires associés à cette conférence
        return view('listerCommentaires',compact('laConference','lesCommentaires'));
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
