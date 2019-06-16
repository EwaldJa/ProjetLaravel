<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Conference;

use App\Modeles\ConferenceDAO;
//use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getConferences(){
        $conference = new ConferenceDAO();
        $lesConferences = $conference->getLesConferences();
        return view('listerConferences',compact('lesConferences'));
    }

    //Selection d'une conference par son id
    public function getConferenceById($idConf)
    {
        $conference = new ConferenceDAO();
        $laConference = $conference->getConferenceById($idConf);
        $lesCommentaires = $laConference->getLesCommentaires();
        //pour simplifier l'accès aux données dans la vue "ListerCommentaire', on passe deux objets
        //laConference représente la conférence qui a été sélectionnée
        //lesCommentaires représente la liste des commentaires associés à cette conférence
        return view('listerCommentaires',compact('laConference','lesCommentaires'));
    }

    public function ajoutConference(){
        return view('formAjoutConference');
    }

    public function postAjoutConference(InsertionConfRequest $request){
        $maConference = new Conference();
        $maConference->setIntituleConf($request->input('intituleConf'));
        $maConference->setDescriptionConf($request->input('descriptionConf'));
        $maConferenceDAO = new ConferenceDAO();
        $maConferenceDAO->creationConference($maConference);
        return view('insertionOK');
    }
}
