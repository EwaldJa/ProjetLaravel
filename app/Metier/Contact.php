<?php


namespace App\Metier;


class Contact
{
    private $id_Contact;
    private $prenom_Contact;
    private $nom_Contact;
    private $email_Contact;
    private $objet_Contact;
    private $message_Contact;
    private $societe_Contact;
    private $telephone_Contact;
    private $codepostal_Contact;
    private $adresse_Contact;

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->id_Contact;
    }

    /**
     * @param mixed $id_Contact
     */
    public function setIdContact($id_Contact): void
    {
        $this->id_Contact = $id_Contact;
    }

    /**
     * @return mixed
     */
    public function getPrenomContact()
    {
        return $this->prenom_Contact;
    }

    /**
     * @param mixed $prenom_Contact
     */
    public function setPrenomContact($prenom_Contact): void
    {
        $this->prenom_Contact = $prenom_Contact;
    }

    /**
     * @return mixed
     */
    public function getNomContact()
    {
        return $this->nom_Contact;
    }

    /**
     * @param mixed $nom_Contact
     */
    public function setNomContact($nom_Contact): void
    {
        $this->nom_Contact = $nom_Contact;
    }

    /**
     * @return mixed
     */
    public function getEmailContact()
    {
        return $this->email_Contact;
    }

    /**
     * @param mixed $email_Contact
     */
    public function setEmailContact($email_Contact): void
    {
        $this->email_Contact = $email_Contact;
    }

    /**
     * @return mixed
     */
    public function getObjetContact()
    {
        return $this->objet_Contact;
    }

    /**
     * @param mixed $objet_Contact
     */
    public function setObjetContact($objet_Contact): void
    {
        $this->objet_Contact = $objet_Contact;
    }

    /**
     * @return mixed
     */
    public function getMessageContact()
    {
        return $this->message_Contact;
    }

    /**
     * @param mixed $message_Contact
     */
    public function setMessageContact($message_Contact): void
    {
        $this->message_Contact = $message_Contact;
    }

    /**
     * @return mixed
     */
    public function getSocieteContact()
    {
        return $this->societe_Contact;
    }

    /**
     * @param mixed $societe_Contact
     */
    public function setSocieteContact($societe_Contact): void
    {
        $this->societe_Contact = $societe_Contact;
    }

    /**
     * @return mixed
     */
    public function getTelephoneContact()
    {
        return $this->telephone_Contact;
    }

    /**
     * @param mixed $telephone_Contact
     */
    public function setTelephoneContact($telephone_Contact): void
    {
        $this->telephone_Contact = $telephone_Contact;
    }

    /**
     * @return mixed
     */
    public function getCodepostalContact()
    {
        return $this->codepostal_Contact;
    }

    /**
     * @param mixed $codepostal_Contact
     */
    public function setCodepostalContact($codepostal_Contact): void
    {
        $this->codepostal_Contact = $codepostal_Contact;
    }

    /**
     * @return mixed
     */
    public function getAdresseContact()
    {
        return $this->adresse_Contact;
    }

    /**
     * @param mixed $adresse_Contact
     */
    public function setAdresseContact($adresse_Contact): void
    {
        $this->adresse_Contact = $adresse_Contact;
    }
}