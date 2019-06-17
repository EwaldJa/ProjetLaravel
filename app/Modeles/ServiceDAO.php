<?php

namespace App\Modeles;
use DB;
use App\Metier\Image;
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
        $monService = DB::table('services')->where('id_Service', '=', $id_Service)->first();
        $service = $this->creerObjetMetier($monService);
        return $service;
    }

    public function getLesImages($id_Service) {
        $images = DB::table('images_services')->where('fk_Image', '=', $id_Service)->get();
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
        $leService->setIdService($objet->id_Service);
        $leService->setIntituleService($objet->intitule_Service);
        $leService->setDescriptionService($objet->description_Service);
        //Il faut maintenant sélectionner les images associées au service
        $lesImages = $this->getLesImages($objet->id_Service);
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
        $limage -> setIdImage($objet -> id_Image);
        $limage -> setFKImage($objet -> fk_Image);
        $limage -> setLienImage($objet -> lien_Image);
        return $limage;
    }

    public function creationService(Service $unService, $monImage){
        DB::table('services')->insert(['intitule_Service'=>$unService->getIntituleService(),'description_Service'=>$unService->getDescriptionService()]);
        $id = DB::getPDO()->lastInsertId();
        if($monImage != null){
            $monImage->setFKImage($id);
            DB::table('images_services')->insert(['fk_Image'=>$monImage->getFKImage(),'lien_Image'=>$monImage->getLienImage()]);
        }
    }

    public function updateService(Service $unService, $monImage){
        DB::table('services')->where('id_Service',$unService->getIdService())->update(['intitule_Service'=>$unService->getIntituleService(),'description_Service'=>$unService->getDescriptionService()]);
        if($monImage != null){
            if($unService->getLesImages()!=null) {
                DB::table('images_services')->where('id_Image', '=', $unService->getLesImages()[0]->getIdImage())->update(['lien_Image' => $monImage->getLienImage()]);
            }else {
                DB::table('images_services')->insert(['fk_Image' => $unService->getIdService(), 'lien_Image' => $monImage->getLienImage()]);
            }
        }else{
            if($unService->getLesImages()!=null) {
                DB::table('images_services')->where('fk_Image', '=', $unService->getLesImages()[0])->delete();
            }
        }
    }

    public function supprImage(Image $monImage) {
        DB::table('images_services')->where('id_Image','=', $monImage->getIdImage())->delete();
    }



}