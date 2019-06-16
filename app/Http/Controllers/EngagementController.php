<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Image;
use App\Metier\Engagement;

use App\Modeles\EngagementDAO;
//use Illuminate\Http\Request;

class EngagementController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getEngagements(){
        $engagement = new EngagementDAO();
        $lesEngagements = $engagement->getLesEngagements();
        return view('listerEngagements',compact('lesEngagements'));
    }

    //Selection d'une conference par son id
    public function getEngagementById($idConf)
    {
        $conference = new EngagementDAO();
        $laConference = $conference->getEngagementById($idConf);
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
            $maConference = new Engagement();
            $maConference->setIntituleConf($request->input('intituleConf'));
            $maConference->setDescriptionConf($request->input('descriptionConf'));
            $maConferenceDAO = new EngagementDAO();
            $maConferenceDAO->creationConference($maConference);
            return view('insertionOK');
        }
    */
}
