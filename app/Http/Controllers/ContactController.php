<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Http\Requests\InsertionContactRequest;
use App\Metier\Image;
use App\Metier\Contact;

use App\Modeles\ContactDAO;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    //Selection de toutes les conférences
    public function getContact(){
        if (Auth::user() != null) {
            $contact = new ContactDAO();
            $lesContacts = $contact->getLesContacts();
            return view('listerContacts',compact('lesContacts'));
        }
        return view('Contacter');
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
    public function envoyerContact(InsertionContactRequestRequest $request)
    {
        return view('welcome');
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
