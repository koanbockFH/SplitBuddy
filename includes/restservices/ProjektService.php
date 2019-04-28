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

    protected function createRequest($data)
    {
        $data = '{"title":"Testprojekt","anmerkung":"meineAnmerkung","teilnehmer":[{"vorname":"111","nachname":"111","geburtstag":"0001-01-01","geschlecht":"Weiblich","email":"1@1"},{"vorname":"222","nachname":"222","geburtstag":"0002-02-02","geschlecht":"Weiblich","email":"2@2"},{"vorname":"333","nachname":"333","geburtstag":"0003-03-03","geschlecht":"Weiblich","email":"3@3"},{"vorname":"444","nachname":"444","geburtstag":"0004-04-04","geschlecht":"Weiblich","email":"4@4"}],"gruppenEinstellungType":0,"anzahl":"2","sortierung":0,"gruppen":[]}';

        if(sizeOf($data) == 0)
        {
            return;
        }

        $jsonObj = json_decode($data);

        $projekt = new Projekt();
        $projekt->loadFromJSON($jsonObj);
        $teilnehmerListe = array();

        foreach($jsonObj->teilnehmer as $tJsonObj)
        {
            $t = new Teilnehmer();
            $t->loadFromJSON($tJsonObj);
            array_push($teilnehmerListe, $t);
        }

        $this->calculateGruppen($teilnehmerListe, $projekt);

        $this->returnJSON(true, "Successful", $projekt);
    }

    private function calculateGruppen($teilnehmer, Projekt $projekt)
    {
        $projekt->addGruppe(new Gruppe());
    }
}