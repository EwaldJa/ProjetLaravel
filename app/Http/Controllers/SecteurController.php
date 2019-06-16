<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Image;
use App\Metier\SecteurActivite;

use App\Modeles\SecteurActiviteDAO;
//use Illuminate\Http\Request;

class SecteurController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getSecteurs(){
        $secteurDAO = new SecteurActiviteDAO();
        $lesSecteursActivite  = $secteurDAO ->getLesSecteurActivite();
        return view('listerSecteursActivite',compact('lesSecteursActivite'));
    }

    //Selection d'une conference par son id
    public function getSecteurActiviteById($idConf)
    {
        $conference = new SecteurActiviteDAO();
        $laConference = $conference->getSecteurActiviteById($idConf);
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
            $maConference = new SecteurActivite();
            $maConference->setIntituleConf($request->input('intituleConf'));
            $maConference->setDescriptionConf($request->input('descriptionConf'));
            $maConferenceDAO = new SecteurActiviteDAO();
            $maConferenceDAO->creationConference($maConference);
            return view('insertionOK');
        }
    */
}
