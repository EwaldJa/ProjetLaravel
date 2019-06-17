<?php

namespace App\Http\Controllers;
use App\Http\Requests\VisualisationContactRequest;
use App\Http\Requests\InsertionContactRequest;
use App\Http\Requests\SuppressionContactRequest;
use App\Metier\Contact;

use App\Modeles\ContactDAO;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{

    //Selection de tous les contacts
    public function getContact(){
        if (Auth::user() != null) {
            $contact = new ContactDAO();
            $lesContacts = $contact->getLesContacts();
            return view('listerContacts',compact('lesContacts'));
        }
        return view('Contacter');
    }
    public function envoyerContact(InsertionContactRequest $request){
        $monContact = new Contact();
        $monContact->setNomContact($request->input('nom_Contact'));
        $monContact->setPrenomContact($request->input('prenom_Contact'));
        $monContact->setEmailContact($request->input('email_Contact'));
        $monContact->setTelephoneContact($request->input('telephone_Contact'));
        $monContact->setSocieteContact($request->input('societe_Contact'));
        $monContact->setCodepostalContact($request->input('codepostal_Contact'));
        $monContact->setAdresseContact($request->input('adresse_Contact'));
        $monContact->setObjetContact($request->input('objet_Contact'));
        $monContact->setMessageContact($request->input('message_Contact'));


        $monContactDAO = new ContactDAO();
        $leContact = $monContactDAO->creationContact($monContact);
        return view('ContactOK',compact('leContact'));
    }
    //Selection d'un contact par son id
    public function getContactById(VisualisationContactRequest $request)
    {
        $contactDAO = new ContactDAO();
        $leContact = $contactDAO->getContactById($request->input('id_Contact'));
        return view('detailsContact',compact('leContact'));
    }

    public function supprContact(SuppressionContactRequest $request) {
        $contactDAO = new ContactDAO();
        $contactDAO->supprContact($request->input('id_Contact'));
        $lesContacts = $contactDAO->getLesContacts();
        return view('listerContacts',compact('lesContacts'));
    }
}
