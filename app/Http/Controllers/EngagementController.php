<?php

namespace App\Http\Controllers;

use App\Modeles\EngagementDAO;

class EngagementController extends Controller
{
    //
    //Selection de tous les engagements
    public function getEngagements(){
        $engagement = new EngagementDAO();
        $lesEngagements = $engagement->getLesEngagements();
        return view('listerEngagements',compact('lesEngagements'));
    }

    /*
    //Selection d'un engagement par son id
    public function getEngagementById($id_engagement)
    {
        $engagement = new EngagementDAO();
        $lengagement = $engagement->getEngagementById($id_engagement);
        return null;
    }
    */
}
