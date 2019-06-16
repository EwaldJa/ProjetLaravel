<?php
/**
 * Created by PhpStorm.
 * User: ISI2
 * Date: 25/04/2019
 * Time: 19:50
 */

namespace App\Metier;

class Commentaire {

    private $idCom;
    private $auteurCom;
    private $contenuCom;


    public function getIdCom() {return $this->idCom;}
    public function setIdCom($id) {$this->idCom = $id;}
    public function getAuteurCom() {return $this->auteurCom;}
    public function setAuteurCom(User $auteur) { $this->auteurCom = $auteur; }
    public function getContenuCom() { return $this->contenuCom; }
    public function setContenuCom($contenu) {$this->contenuCom = $contenu;}

}