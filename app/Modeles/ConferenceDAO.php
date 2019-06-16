<?php

namespace App\Modeles;
use DB;
use App\Metier\Conference;

class ConferenceDAO extends DAO
{

    public function getLesConferences()
    {
        $conferences = DB::table('conference')->get();
        $lesConferences = array();
        foreach ($conferences as $laConference) {
            $idConf = $laConference->idConf;
            $lesConferences[$idConf] = $this->creerObjetMetier($laConference);
        }
        return $lesConferences;
    }

    public function getConferenceById($idConf)
    {
        //On sélectionne une conference par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $maConference = DB::table('conference')->where('idConf', '=', $idConf)->first();
        $conference = $this->creerObjetMetier($maConference);
        return $conference;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $laConference = new Conference();
        $laConference->setIdConf($objet->idConf);
        $laConference->setIntituleConf($objet->intituleConf);
        $laConference->setDescriptionConf($objet->descriptionConf);
        //Il faut maintenant sélectionner les commentaires associés à la conférence
        $commentaireDAO = new CommentaireDAO();
        $lesCommentaires = $commentaireDAO->getLesCommentaires($objet->idConf);
        //Si la conférence possède des commentaires
        if($lesCommentaires){
            //On modifie l'attribut lesCommentaires de la classe Conference
            $laConference->setLesCommentaires($lesCommentaires);
        }
        else
            $laConference->setLesCommentaires(null);
        return $laConference;
    }

    public function creationConference(Conference $uneConference){
        DB::table('conference')->insert(['intituleConf'=>$uneConference->getIntituleConf(),'descriptionConf'=>$uneConference->getDescriptionConf()]);
    }
}