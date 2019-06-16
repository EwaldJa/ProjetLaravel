<?php

namespace App\Modeles;
use DB;
use App\Metier\Service;

class ServiceDAO extends DAO
{

    public function getLesServices()
    {
        $services = DB::table('services')->get();
        $lesServices = array();
        foreach ($services as $leService) {
            $id_Service = $leService->id_Service;
            $lesServices[$id_Service] = $this->creerObjetMetier($leService);
        }
        return $lesServices;
    }

    public function getServiceById($id_Service)
    {
        //On sélectionne un service par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monService = DB::table('conference')->where('id_Service', '=', $id_Service)->first();
        $service = $this->creerObjetMetier($monService);
        return $service;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $laConference = new Service();
        $laConference->setIdConf($objet->idConf);
        $laConference->setIntituleConf($objet->intituleConf);
        $laConference->setDescriptionConf($objet->descriptionConf);
        //Il faut maintenant sélectionner les commentaires associés à la conférence
        $commentaireDAO = new CommentaireDAO();
        $lesCommentaires = $commentaireDAO->getLesCommentaires($objet->idConf);
        //Si la conférence possède des commentaires
        if($lesCommentaires){
            //On modifie l'attribut lesCommentaires de la classe Service
            $laConference->setLesCommentaires($lesCommentaires);
        }
        else
            $laConference->setLesCommentaires(null);
        return $laConference;
    }

    public function creationConference(Service $uneConference){
        DB::table('conference')->insert(['intituleConf'=>$uneConference->getIntituleConf(),'descriptionConf'=>$uneConference->getDescriptionConf()]);
    }
}