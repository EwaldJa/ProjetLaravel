<?php

namespace App\Modeles;
use DB;
use App\Metier\Commentaire;


class CommentaireDAO extends DAO
{
    //
    public function getLesCommentaires($idConf)
    {
        $lesCommentaires=array();
        $commentaires=DB::table('commentaire')->select ('idCom','contenuCom', 'idUsr')->where('idConf','=',$idConf)->get();
        if($commentaires)
        {
            foreach ($commentaires as $leCommentaire){
                //On récupère l'auteur du commentaire sous la forme d'un objet métier
                $user = new UserDAO();
                $leUser = $user->retrieveById($leCommentaire->idUsr);
                $idCom = $leCommentaire->idCom;
                $lesCommentaires[$idCom] = $this->creerObjetMetier($leCommentaire);
                //On affecte le user associé au commentaire qui vient d'être ajouté au tableau
                $lesCommentaires[$idCom]->setAuteurCom($leUser);
            }
        }
        return $lesCommentaires;
    }


    protected function creerObjetMetier(\stdClass $objet)
    {
        $leCommentaire= new Commentaire();
        $leCommentaire->setIdCom($objet->idCom);
        $leCommentaire->setContenuCom($objet->contenuCom);
        return $leCommentaire;
    }

}
