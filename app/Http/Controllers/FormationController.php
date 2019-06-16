<?php

namespace App\Http\Controllers;


use App\Modeles\FormationDAO;

use Illuminate\Http\Request;

class FormationController extends Controller
{
    //
    public function getFormations(){
        $formation = new FormationDAO();
        $lesFormations = $formation->getLesFormations();
        return view('listerFormations',compact('lesFormations'));
    }
}
