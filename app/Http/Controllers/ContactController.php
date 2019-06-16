<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Metier\Image;
use App\Metier\Contact;

use App\Modeles\ContactDAO;
//use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getContact(){
        $contact = new ContactDAO();
        $lesContact = $contact->getLesContacts();
        return view('listerConferences',compact('lesContact'));
    }

    //Selection d'une conference par son id
    public function getContactById($idConf)
    {
        $conference = new ContactDAO();
        $laConference = $conference->getContactById($idConf);
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
            $maConference = new Contact();
            $maConference->setIntituleConf($request->input('intituleConf'));
            $maConference->setDescriptionConf($request->input('descriptionConf'));
            $maConferenceDAO = new ContactDAO();
            $maConferenceDAO->creationConference($maConference);
            return view('insertionOK');
        }
    */
}
