<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Image;
use App\Metier\Histoire;

use App\Modeles\HistoireDAO;
//use Illuminate\Http\Request;

class HistoireController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getHistoires(){
        $histoire = new HistoireDAO();
        $lesHistoires = $histoire->getLesHistoires();
        return view('listerHistoires',compact('lesHistoires'));
    }

    //Selection d'une conference par son id
    public function getHistoireById($idConf)
    {
        $conference = new HistoireDAO();
        $laConference = $conference->getHistoireById($idConf);
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
            $maConference = new Histoire();
            $maConference->setIntituleConf($request->input('intituleConf'));
            $maConference->setDescriptionConf($request->input('descriptionConf'));
            $maConferenceDAO = new HistoireDAO();
            $maConferenceDAO->creationConference($maConference);
            return view('insertionOK');
        }
    */
}
