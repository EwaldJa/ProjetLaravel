<?php

namespace App\Http\Controllers;

use App\Modeles\SecteurActiviteDAO;

class SecteurController extends Controller
{
    //
    //Selection de tous les secteurs
    public function getSecteurs(){
        $secteurDAO = new SecteurActiviteDAO();
        $lesSecteursActivite  = $secteurDAO ->getLesSecteurActivites();
        return view('listerSecteursActivite',compact('lesSecteursActivite'));
    }

    /*
    //Selection d'un secteur par son id
    public function getSecteurActiviteById($id_secteur)
    {
        $secteur = new SecteurActiviteDAO();
        $leSecteur = $secteur->getSecteurActiviteById($id_secteur);
        return null;
    }


    */
}
