<?php

class ProjektService extends BaseService
{
    protected function getRequest($data)
    {
        return; //not Used
    }

    protected function saveRequest($data)
    {
        return; //not Used
    }

    protected function deleteRequest($data)
    {
        return; //not Used
    }

    /**
     * Creates Projekt and calculates all Values
     * @param $data : Data of Projekt
     */
    protected function createRequest($data)
    {
        if(!isset($data['data']))
        {
            return;
        }

        //Hole Daten von Post
        $jsonObj = json_decode($data['data']);

        $projekt = new Projekt();
        $projekt->loadFromJSON($jsonObj);
        $teilnehmerListe = array();

        foreach($jsonObj->teilnehmer as $tJsonObj)
        {
            $t = new Teilnehmer();
            $t->loadFromJSON($tJsonObj);
            array_push($teilnehmerListe, $t);
        }
        //Alle Daten vorbereitet, nun muss die Aufteilung gemacht werden

        $this->calculateGruppen($teilnehmerListe, $projekt);

        if(sizeof($projekt->gruppen) == 0)
        {
            $this->returnJSON(false, "Es wurden keine Gruppen erstellt");
            return;
        }

        //Speichere Daten in DB
        $projekt->createOrUpdate();

        $this->returnJSON(true, "Successful", array("id" => $projekt->id));
    }

    private function calculateGruppen($teilnehmer, Projekt $projekt)
    {
        //Anzahl der Gruppen
        if($projekt->gruppenAufteilungType == 0)
        {
            $this->divideByGroupCount($teilnehmer, $projekt->anzahl, $projekt);
        }
        //TODO Anzahl Teilnehmer und indiv. Gruppen hinzufügen & deren respektive Methode wie "DivideByGroupCount"
        else
        {
            $this->divideByGroupCount($teilnehmer, $projekt->anzahl, $projekt);
        }
    }

    private function divideByGroupCount($teilnehmer, $anzahlGruppen, Projekt $projekt)
    {
        //GruppenAufteilung hier machen BEGINN
        $one = new Gruppe();
        $two = new Gruppe();

        $one->addTeilnehmer($teilnehmer[0]);
        $one->addTeilnehmer($teilnehmer[1]);
        $two->addTeilnehmer($teilnehmer[2]);
        $two->addTeilnehmer($teilnehmer[3]);

        //ENDE

        //Hier die erzeugten Gruppen Hinzufügen
        $projekt->addGruppe($one);
        $projekt->addGruppe($two);
    }
}