<?php

/**
 * Class Teilnehmer
 */
class Teilnehmer
{
    public $id;
    public $vorname;
    public $nachname;
    public $geburtsdatum;
    public $mail;
    public $geschlecht;

    public $gruppenID;
    public $geschlechtID;

    /**
     * Sets Values of Instance to the given Data found in Database by the given ID
     * @param $id : of value in DB
     */
    public function get($id)
    {
        $repo = new TeilnehmerRepository();

        $data = $repo->getById($id);

        $this->id = $data->teilnehmerID;
        $this->vorname = $data->vname;
        $this->nachname = $data->nname;
        $this->geburtsdatum = $data->gebdate;
        $this->gruppenID = $data->gruppenID;
        $this->geschlechtID = $data->geschlechtID;

        $this->geschlecht = new Geschlecht();
        $this->geschlecht->get($data->geschlechtID);
    }

    /**
     * Creates or Updates Values in DB - Childs are also saved
     */
    public function createOrUpdate()
    {
        $repo = new TeilnehmerRepository();
        $insertedId = $repo->createOrUpdate($this);
        $this->id = $insertedId;
    }

    /**
     * Deletes the current Object from DB
     * @return bool|mysqli_result
     */
    public function delete()
    {
        $repo = new TeilnehmerRepository();
        return $repo->delete($this->id);
    }

    /**
     * Maps Data from jsonDecoded Object - FIXED SCHEMA
     * @param $jsonObj
     */
    public function loadFromJSON($jsonObj)
    {
        $this->vorname = $jsonObj->vorname;
        $this->nachname = $jsonObj->nachname;
        $this->geburtsdatum = $jsonObj->geburtstag;
        $this->geschlechtID = $jsonObj->geschlecht;
        $this->mail = $jsonObj->email;

        $this->geschlecht = new Geschlecht();
        $this->geschlecht->get($this->geschlechtID);
    }

}