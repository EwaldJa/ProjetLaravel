<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\Contact;

class ContactDAO extends DAO
{

    public function getLesContacts()
    {
        $contacts = DB::table('contacts')->get();
        $lesContacts = array();
        foreach ($contacts as $leContact) {
            $id_Contact = $leContact->id_Contact;
            $lesContacts[$id_Contact] = $this->creerObjetMetier($leContact);
        }
        return $lesContacts;
    }

    public function getContactById($id_Contact)
    {
        //On sélectionne un contact par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monContact = DB::table('contacts')->where('id_Contact', '=', $id_Contact)->first();
        $contact = $this->creerObjetMetier($monContact);
        return $contact;
    }

    public function getLesImages($id_Contact) {
        $images = DB::table('images_contacts')->where('fk_Image', '=', $id_Contact)->get();
        $lesImages = array();
        $i = 0;
        foreach ($images as $limage) {
            $lesImages[$i] = $this->creerImageMetier($limage);
            $i = $i + 1;
        }
        return $lesImages;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $leContact = new Contact();


        $leContact->setNomContact($objet->nom_Contact);
        $leContact->setPrenomContact($objet->prenom_Contact);
        $leContact->setEmailContact($objet->email_Contact);
        $leContact->setTelephoneContact($objet->telephone_Contact);
        $leContact->setSocieteContact($objet->societe_Contact);
        $leContact->setCodepostalContact($objet->codepostal_Contact);
        $leContact->setAdresseContact($objet->adresse_Contact);
        $leContact->setObjetContact($objet->objet_Contact);
        $leContact->setMessageContact($objet->message_Contact);
        return $leContact;
    }

    protected function creerImageMetier(\stdClass $objet) {
        $limage = new Image();
        $limage -> setIdImage($objet -> id_Image);
        $limage -> setFKImage($objet -> fk_Image);
        $limage -> setLienContact($objet -> lien_Image);
        return $limage;
    }


    public function creationContact(Contact $unContact){
        DB::table('contacts')->insert([
            'nom_Contact'=>$unContact->getNomContact(),
            'prenom_Contact'=>$unContact->getPrenomContact(),
            'email_Contact'=>$unContact->getEmailContact(),
            'telephone_Contact'=>$unContact->getTelephoneContact(),
            'societe_Contact'=>$unContact->getSocieteContact(),
            'codepostal_Contact'=>$unContact->getCodepostalContact(),
            'adresse_Contact'=>$unContact->getAdresseContact(),
            'objet_Contact'=>$unContact->getObjetContact(),
            'message_Contact'=>$unContact->getMessageContact()
        ]);
    }




}