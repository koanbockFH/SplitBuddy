<?php

/**
 * Class Gruppe
 */
class Gruppe
{
    public $id;
    public $gruppenname;
    public $anzahl;
    public $teilnehmer = array();

    public $projektID;

    /**
     * Sets Values of Instance to the given Data found in Database by the given ID
     * @param $id : of value in DB
     */
    public function get($id)
    {
        $repo = new GruppeRepository();

        $data = $repo->getById($id);

        $this->id = $data->gruppenID;
        $this->gruppenname = $data->gruppenname;
        $this->projektID = $data->projektID;

        $teilnehmerRepo = new TeilnehmerRepository();
        $teilnehmer = $teilnehmerRepo->getIdListByParentId($this->id);

        foreach($teilnehmer as $item)
        {
            $t = new Teilnehmer();
            $t->get($item->teilnehmerID);
            $this->addTeilnehmer($t);
        }
    }

    /**
     * Creates or Updates Values in DB - Childs are also saved
     */
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

    /**
     * Deletes the current Object from DB
     * @return bool|mysqli_result
     */
    public function delete()
    {
        $repo = new GruppeRepository();
        return $repo->delete($this->id);
    }

    /**
     * Adds Teilnehmer to List of Teilnehmer
     * @param $teilnehmer : Teilnehmer to be added
     */
    public function addTeilnehmer(Teilnehmer $teilnehmer)
    {
        array_push($this->teilnehmer, $teilnehmer);
    }

    /**
     * Resets Lists of Teilnehmer
     */
    public function resetTeilnehmer()
    {
        $this->teilnehmer = array();
    }

    /**
     * Maps Data from jsonDecoded Object - FIXED SCHEMA
     * @param $jsonObj
     */
    public function loadFromJSON($jsonObj)
    {
        $this->gruppenname = $jsonObj->groupName;
        $this->anzahl = $jsonObj->amount;
    }
}