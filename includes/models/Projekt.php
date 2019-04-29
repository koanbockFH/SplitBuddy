<?php

class Projekt
{
    public $id;
    public $titel;
    public $anmerkung;
    public $anzahl;
    public $gruppenAufteilungType;
    public $sortierType;
    public $gruppen = array();

    public $userID;

    /**
     * Projekt constructor. Sets UserID to the current SessionUserID
     */
    public function __construct()
    {
        $user = new SessionUser();
        $this->userID = $user->id;
    }

    /**
     * Sets Values of Instance to the given Data found in Database by the given ID
     * @param $id : of value in DB
     */
    public function get($id)
    {
        $repo = new ProjektRepository();

        $data = $repo->getById($id);

        $this->id = $data->projektID;
        $this->titel = $data->titel;
        $this->anmerkung = $data->anmerkung;
        $this->anzahl = $data->anzahl;
        $this->gruppenAufteilungType = $data->typ;
        $this->sortierType = $data->sortierkriterium;
        $this->userID = $data->userID;

        $gruppenRepo = new GruppeRepository();
        $gruppen = $gruppenRepo->getIdListByParentId($this->id);

        foreach($gruppen as $gruppe)
        {
            $g = new Gruppe();
            $g->get($gruppe->gruppenID);
            $this->addGruppe($g);
        }
    }

    /**
     * Creates or Updates Values in DB - Childs are also saved
     */
    public function createOrUpdate()
    {
        $repo = new ProjektRepository();
        $insertedId = $repo->createOrUpdate($this);
        $this->id = $insertedId;

        if($insertedId > 0)
        {
            foreach($this->gruppen as $g)
            {
                $g->projektID = $insertedId; //set ProjektId
                $g->createOrUpdate();
            }
        }
    }

    /**
     * Deletes the current Object from DB
     * @return bool|mysqli_result
     */
    public function delete()
    {
        $repo = new ProjektRepository();
        return $repo->delete($this->id);
    }

    /**
     * Adds Gruppe to List of Gruppe
     * @param $gruppe : Gruppe to be added
     */
    public function addGruppe(Gruppe $gruppe)
    {
        array_push($this->gruppen, $gruppe);
    }

    /**
     * Resets Lists of Gruppe
     */
    public function resetGruppen()
    {
        $this->gruppen = array();
    }

    /**
     * Maps Data from jsonDecoded Object - FIXED SCHEMA
     * @param $jsonObj
     */
    public function loadFromJSON($jsonObj)
    {
        $this->titel = $jsonObj->title;
        $this->anmerkung = $jsonObj->anmerkung;
        $this->anzahl = $jsonObj->anzahl;
        $this->gruppenAufteilungType = $jsonObj->gruppenEinstellungType;
        $this->sortierType = $jsonObj->sortierung;

        foreach($jsonObj->gruppen as $g)
        {
            $gruppe = new Gruppe();
            $gruppe->loadFromJSON($g);

            $this->addGruppe($gruppe);
        }
    }
}