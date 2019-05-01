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
        if (!isset($data['data'])) {
            return;
        }

        //Hole Daten von Post
        $jsonObj = json_decode($data['data']);

        $projekt = new Projekt();
        $projekt->loadFromJSON($jsonObj);
        $teilnehmerListe = array();

        foreach ($jsonObj->teilnehmer as $tJsonObj) {
            $t = new Teilnehmer();
            $t->loadFromJSON($tJsonObj);
            array_push($teilnehmerListe, $t);
        }




        // Sortierung
        $this->sortTeilnehmer($teilnehmerListe, $projekt);

        //Alle Daten vorbereitet, nun muss die Aufteilung gemacht werden

        $this->calculateGruppen($teilnehmerListe, $projekt);

        //Speichere Daten in DB
        $projekt->createOrUpdate();

        $this->returnJSON(true, "Successful", array("id" => $projekt->id));
    }

    private function calculateGruppen($teilnehmerListe, Projekt $projekt)
    {
        //Anzahl der Gruppen
        if ($projekt->gruppenAufteilungType == 0) {
            $this->divideByGroupCount($teilnehmerListe, $projekt->anzahl, $projekt);
        }
        else if ($projekt->gruppenAufteilungType == 1) {
            $this->divideByGroupCount($teilnehmerListe, $projekt->anzahl, $projekt, false);
        } // Anzahl Teilnehmer und indiv. Gruppen hinzufügen & deren respektive Methode wie "DivideByGroupCount"
        else {
            $this->divideIndividualGroup($teilnehmerListe, $projekt);
        }
    }

    function sortTeilnehmer($teilnehmerListe, $projekt){


        if ($projekt->sortierType == 0){
            // Sortierung: Datum (Älteste zuerst)
            usort($teilnehmerListe, function($a, $b){
                if(strtotime($b->geburtsdatum) == strtotime($a->geburtsdatum))
                    return 0;

                return strtotime($a->geburtsdatum) < strtotime($b->geburtsdatum) ? -1 : 1;
            });
        }

        if($projekt->sortierType == 1) {
            // Sortierung: Geschlecht (Männlich zuerst)
            usort($teilnehmerListe, function($a, $b){
                if($a->geschlecht->id == $b->geschlecht->id)
                    return 0;

                return ($a->geschlecht->id < $b->geschlecht->id) ? -1 : 1;
            });
        };

        return $teilnehmerListe;
    }

    /**
     * @param Teilnehmer $teilnehmer <- if we have this - we have a reference to Project...
     * @param $anzahl
     * @param Projekt $projekt <- why?
     * @param divideByGroups boolean (true: divide by Groups false: put anzahl Teilnehmer into Groups)
     */

    /*Dieser Code wurde im Unterricht mit Hilfe von Herrn Hoover geschrieben

    public function divideByGroupCount($teilnehmerListe, $anzahl, Projekt $projekt)
    {
        //wenn keine sortierung zuvor ist funktioniert dieser Code
       // if ($projekt->sortierType == 2){

            $counter = 0;
            $groups = array();

            //sortierung / vorher oder nachher?...
            if ($projekt->gruppenAufteilungType == 0)
            {
                //diesen code anpassen

                foreach ($teilnehmerListe as $teilnehmer)
                {

                    $groupnumber = $counter % intval($anzahl);

                    //var_dump($groupnumnber);

                    $groups[$groupnumber][] = $teilnehmer;

                    $counter++;
                }

            }
            else if ($projekt->gruppenAufteilungType == 1)
            {

                $counter = 0;

                $groupnumber = 0;

                foreach ($teilnehmerListe as $teilnehmer)
                {

                    if ($counter % intval($anzahl) == 0)
                    {
                        $groupnumber++;
                    }



                    $groups[$groupnumber][] = $teilnehmer;

                    $counter++;
                }

                //var_dump($groups);

            }


            foreach ($groups as $group)
            {
                $newGroup = new Gruppe();

                foreach ($group as $teilnehmer)
                {

                    $newGroup->addTeilnehmer($teilnehmer);
                }


                $projekt->addGruppe($newGroup);
            }

            return $projekt;


        //Das war ein Versuch, den Code auf eine andere Art zu schreiben
        /*else {

                if ($projekt->gruppenAufteilungType == 0)
                {
                    //diesen code anpassen
                    $gruppenGroesse = (count($teilnehmerListe) / $anzahl);
                    $gruppen = array_chunk($teilnehmerListe, round($gruppenGroesse));

                    $cnt = 1;

                    var_dump($gruppen);


                    foreach ($gruppen as $gruppe){

                        $newGroup = new Gruppe();

                        foreach ($gruppe as $teilnehmer){
                            $newGroup->addTeilnehmer($teilnehmer);
                        }


                        $cnt++;


                    }
                   return $projekt;

                }*/




    //gehört zu Versuch 2
    /*function divideByPersonCount($teilnehmerInput, $anzahlInput)
    {
        $gruppen = array_chunk($teilnehmerInput, round($anzahlInput));
        return $gruppen;
    }*/


        //GruppenAufteilung hier machen BEGINN --> DUMMYDATEN
        /*$one = new Gruppe();
        $two = new Gruppe();

        $one->addTeilnehmer($teilnehmer[0]);
        $one->addTeilnehmer($teilnehmer[1]);
        $two->addTeilnehmer($teilnehmer[2]);
        $two->addTeilnehmer($teilnehmer[3]);

        //ENDE

        //Hier die erzeugten Gruppen Hinzufügen
        $projekt->addGruppe($one);
        $projekt->addGruppe($two);*/

public function divideByGroupCount($teilnehmerListe, Projekt $projekt)
{
    $gruppenAnzahl = 0;
    $teilnehmerAnzahlProGruppe = 0;

    //Berechne Teilnehmeranzahl pro Gruppe
    if($projekt->gruppenAufteilungType == 0)
    {
        //Berechne Datenparameter
        $gruppenAnzahl = $projekt->anzahl;
        $teilnehmerAnzahlProGruppe = round(sizeof($teilnehmerListe) / $gruppenAnzahl);
    }
    //Berechne Gruppen Anzahl
    if($projekt->gruppenAufteilungType == 1)
    {
        //Berechne Datenparameter
        $teilnehmerAnzahlProGruppe = $projekt->anzahl;
        $gruppenAnzahl = sizeof($teilnehmerListe) / $teilnehmerAnzahlProGruppe;
    }

    //erzeuge die Gruppen auf Basis der eingabedaten - die letzte Gruppe wir für Rundungsfehler später hinzugefügt
    for($i = 1; $i<$gruppenAnzahl; $i++)
    {
        $g = new Gruppe();
        $g->gruppenname = "Gruppe " . $i;
        $g->anzahl = $teilnehmerAnzahlProGruppe;

        $projekt->addGruppe($g);
    }

    //es kann sein das keine gleichmäßigkeit möglich ist z.b. 7 teilnehmer auf 2 gruppen (3,4) oder 7 auf 3 (3,3,1) usw.
    //letzte Gruppe erhält also den Rest der Teilnehmer die benötigt werden
    //Alle Teilnehmer - (Anzahl pro Gruppe * (GruppenAnzahl - 1)) = TeilnehmerAnzahl die bisher keiner Gruppe zugewiesen wurde
    $teilnehmerAnzahlLetzterGruppe = sizeof($teilnehmerListe) - ($teilnehmerAnzahlProGruppe * ($gruppenAnzahl - 1));
    $g = new Gruppe();
    $g->gruppenname = "Gruppe " . $gruppenAnzahl; //letzte Gruppe
    $g->anzahl = $teilnehmerAnzahlLetzterGruppe;
    $projekt->addGruppe($g);

    //teile nun die teilnehmer auf die erstellten gruppen auf
    //durch die zuvor sortierte Liste wird nun erst gruppe 1 befüllt, dann gruppe 2 usw. sodass durch die Sortierung zuvor
    // eine sortierte Teilgruppe entsteht
    // Ausnahme beim geschlecht kann es vorkommen das durch Ungleichmäßige anzahl an W/M Geschlechter 1 Gruppe existiert die gemischt ist
    // diese Gruppe wird in den randbedingungen als Ausnahme akzeptiert (vom Team bei Feature definition deklariert siehe Dokumentation)
    foreach ($teilnehmerListe as $teilnehmer) {
        $nochPlatz = false;
        foreach ($projekt->gruppen as $gruppe) {
            if ($nochPlatz == false && sizeof($gruppe->teilnehmer) != $gruppe->anzahl) {
                $gruppe->addTeilnehmer($teilnehmer);
                $nochPlatz = true;
            }
        }
    }
}


    private function divideIndividualGroup($teilnehmerListe, Projekt $projekt)
    {

        $ueberlaufGruppe = new Gruppe();
        foreach ($teilnehmerListe as $teilnehmer)
        {
            $nochPlatz = false;
            foreach ($projekt->gruppen as $gruppe)
            {
                if ($nochPlatz == false && sizeof($gruppe->teilnehmer) != $gruppe->anzahl)
                {
                    $gruppe->addTeilnehmer($teilnehmer);
                    $nochPlatz = true;
                }
            }
            if($nochPlatz == false){
                $ueberlaufGruppe->addTeilnehmer($teilnehmer);
            }

        }
        if(sizeof($ueberlaufGruppe->teilnehmer)>0)
        {
            $projekt->addGruppe($ueberlaufGruppe);
        }

        return $projekt;

    }
}



