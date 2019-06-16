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
        $leContact->setIdContact($objet->id_Contact);
        $leContact->setIntituleContact($objet->intitule_Contact);
        $leContact->setDescriptionContact($objet->description_Contact);
        //Il faut maintenant sélectionner les images associées au contact
        $lesImages = $this->getLesImages($leContact->getIdContact());
        //Si le contact possède des images
        if($lesImages){
            //On modifie l'attribut images_Contact de la classe iContact
            $leContact->setLesImages($lesImages);
        }
        else
            $leContact->setLesImages(null);
        return $leContact;
    }

    protected function creerImageMetier(\stdClass $objet) {
        $limage = new Image();
        $limage -> setIdImage($objet -> id_Image);
        $limage -> setFKImage($objet -> fk_Image);
        $limage -> setLienContact($objet -> lien_Image);
        return $limage;
    }

    public function creationConference(Contact $unContact){
        DB::table('contacts')->insert(['id_Contact'=>$unContact->getIdContact(),'intitule_Contact'=>$unContact->getIntituleContact(),'description_Contact'=>$unContact->getDescriptionContact()]);
    }




}