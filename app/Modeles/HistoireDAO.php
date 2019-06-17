<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\Histoire;

class HistoireDAO extends DAO
{

    public function getLesHistoires()
    {
        $histoires = DB::table('histoire')->get();
        $lesHistoires = array();
        foreach ($histoires as $uneHistoire) {
            $id_Histoire = $uneHistoire->id_Histoire;
            $lesHistoires[$id_Histoire] = $this->creerObjetMetier($uneHistoire);
        }
        return $lesHistoires;
    }

    public function getHistoireById($id_Histoire)
    {
        //On sélectionne un histoire par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monHistoire = DB::table('histoire')->where('id_Histoire', '=', $id_Histoire)->first();
        $histoire = $this->creerObjetMetier($monHistoire);
        return $histoire;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $uneHistoire = new Histoire();
        $uneHistoire->setIdHistoire($objet->id_Histoire);
        $uneHistoire->setParagrapheHistoire($objet->paragraphe_Histoire);

        return $uneHistoire;
    }


    public function creationConference(Histoire $unHistoire){
        DB::table('histoire')->insert(['id_Histoire'=>$unHistoire->getIdHistoire(),'paragraphe_histoire'=>$unHistoire->getparagrapheHistoire()]);
    }




}