<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
use App\Metier\Service;

class ServiceDAO extends DAO
{

    public function getLesServices()
    {
        $services = DB::table('enregistrement')->where('categorie', '=', 'services')->get();
        $lesServices = array();
        foreach ($services as $leService) {
            $id_Service = $leService->id_enregistrement;
            $lesServices[$id_Service] = $this->creerObjetMetier($leService);
        }
        return $lesServices;
    }

    public function getServiceById($id_Service)
    {
        //On sélectionne un service par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monService = DB::table('enregistrement')->where('id_enregistrement', '=', $id_Service)->first();
        $service = $this->creerObjetMetier($monService);
        return $service;
    }

    public function getLesImages($id_Service) {
        $images = DB::table('image')->where('fk_enregistrement', '=', $id_Service)->get();
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
        $leService = new Service();
        $leService->setIdService($objet->id_enregistrement);
        $leService->setIntituleService($objet->intitule);
        $leService->setDescriptionService($objet->description);
        //Il faut maintenant sélectionner les images associées au service
        $lesImages = $this->getLesImages($objet->id_enregistrement);
        //Si le service possède des images
        if($lesImages){
            //On modifie l'attribut images_Service de la classe iService
            $leService->setLesImages($lesImages);
        }
        else
            $leService->setLesImages(null);
        return $leService;
    }

    protected function creerImageMetier(\stdClass $objet) {
        $limage = new Image();
        $limage -> setIdImage($objet -> id_image);
        $limage -> setFKImage($objet -> fk_enregistrement);
        $limage -> setLienImage($objet -> lien_image);
        return $limage;
    }

    public function creationService(Service $unService, $monImage){
        DB::table('enregistrement')->insert(['intitule'=>$unService->getIntituleService(),'description'=>$unService->getDescriptionService(),'categorie'=>'services']);
        $id = DB::getPDO()->lastInsertId();
        if($monImage != null){
            $monImage->setFKImage($id);
            DB::table('image')->insert(['fk_enregistrement'=>$monImage->getFKImage(),'lien_image'=>$monImage->getLienImage()]);
        }
    }

    public function updateService(Service $unService, $monImage){
        DB::table('enregistrement')->where('id_enregistrement',$unService->getIdService())->update(['intitule'=>$unService->getIntituleService(),'description'=>$unService->getDescriptionService()]);
        if($monImage != null){
            if($unService->getLesImages()!=null) {
                DB::table('image')->where('id_image', '=', $unService->getLesImages()[0]->getIdImage())->update(['lien_image' => $monImage->getLienImage()]);
            }else {
                DB::table('image')->insert(['fk_enregistrement' => $unService->getIdService(), 'lien_image' => $monImage->getLienImage()]);
            }
        }else{
            if($unService->getLesImages()!=null) {
                DB::table('image')->where('fk_enregistrement', '=', $unService->getLesImages()[0])->delete();
            }
        }
    }

    public function supprImage(Image $monImage) {
        DB::table('image')->where('id_image','=', $monImage->getIdImage())->delete();
    }

    public function supprService(Service $monService) {
        $lesImages = $monService->getLesImages();
        if ($lesImages != null) {
            foreach ($lesImages as $uneImage) {
                $this->supprImage($uneImage);
            }
        }
        DB::table('enregistrement')->where('id_enregistrement', '=', $monService->getIdService())->where('categorie', '=', 'services')->delete();
    }


}