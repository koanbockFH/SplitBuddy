<?php

class Gruppe
{
    public $id;
    public $gruppenname;
    public $anzahl;
    public $teilnehmer = array();

    public $projektID;

    public function get($id)
    {
        $repo = new GruppeRepository();

        $data = $repo->getById($id);

        $this->id = $data->gruppenID;
        $this->gruppenname = $data->gruppenname;
        $this->projektID = $data->projektID;

        $teilnehmerRepo = new TeilnehmerRepository();
        $teilnehmer = $teilnehmerRepo->getIdListByGruppenId($this->id);

        foreach($teilnehmer as $item)
        {
            $t = new Teilnehmer();
            $t->get($item->teilnehmerID);
            $this->addTeilnehmer($t);
        }
    }

    public function createOrUpdate()
    {
        $repo = new GruppeRepository();
        $insertedId = $repo->createOrUpdate($this);
        $this->id = $insertedId;

        if($insertedId > 0)
        {
            foreach($this->teilnehmer as $t)
            {
                $t->gruppenID = $insertedId; //set GroupId
                $t->projektID = $this->projektID; //set GroupId
                $t->createOrUpdate();
            }
        }
    }

    public function delete()
    {
        $repo = new GruppeRepository();
        return $repo->delete($this->id);
    }

    public function addTeilnehmer($teilnehmer)
    {
        array_push($this->teilnehmer, $teilnehmer);
    }

    public function resetTeilnehmer()
    {
        $this->teilnehmer = array();
    }

    public function loadFromJSON($jsonObj)
    {
        $this->gruppenname = $jsonObj->groupName;
        $this->anzahl = $jsonObj->amount;
    }
}