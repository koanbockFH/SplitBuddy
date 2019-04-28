<?php

class Projekt
{
    public $id;
    public $titel;
    public $anmerkung;
    public $anzahl;
    public $gruppenAufteilungType;
    public $sortierType;
    private $gruppen = array();

    public $userID;

    public function __construct()
    {
        $user = new SessionUser();
        $this->userID = $user->id;
    }

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
    }

    public function createOrUpdate()
    {
        $repo = new ProjektRepository();
        $insertedId = $repo->createOrUpdate($this);

        if($insertedId > 0)
        {
            foreach($this->gruppen as $g)
            {
                $g->projektID = $insertedId; //set ProjektId
                $g->createOrUpdate();
            }
        }
    }

    public function delete()
    {
        $repo = new ProjektRepository();
        return $repo->delete($this->id);
    }

    public function addGruppe($gruppe)
    {
        array_push($this->gruppen, $gruppe);
    }

    public function resetGruppen()
    {
        $this->gruppen = array();
    }

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